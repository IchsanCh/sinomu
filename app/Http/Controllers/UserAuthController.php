<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pesan;
use App\Models\Pegawai;
use App\Models\Announcement;
use App\Models\NotifPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    /**
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
 */
    public function showLogin()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('dashboard.user');
        }
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        if (is_null($user->email_verified_at)) {
            return redirect()->route('signup.otp', ['email' => $user->email])
                ->with('error', 'Akun Anda belum diverifikasi. Silakan masukkan OTP dari email Anda.');
        }

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.user')->with('success', 'Login berhasil! Selamat datang kembali.');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function index()
    {
        $user = Auth::guard('user')->user();
        $pegawai = Pegawai::where('user_id', $user->id)->get();
        $fonnteToken = $user->fonnte;
        $totalPesanTerkirimBulanIni = Pesan::where('user_id', $user->id)
            ->where('status', 'terkirim')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $totalNotifPegawaiBulanIni = NotifPegawai::where('user_id', $user->id)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $totalPesanTerkirim = $totalPesanTerkirimBulanIni + $totalNotifPegawaiBulanIni;
        $fonnteInfo = null;

        if ($fonnteToken) {
            $response = Http::withHeaders([
                'Authorization' => $fonnteToken,
            ])->post('https://api.fonnte.com/device');

            if ($response->successful() && $response->json('status')) {
                $data = $response->json();

                $fonnteInfo = [
                    'device' => $data['device'],
                    'name' => $data['name'],
                    'quota' => $data['quota'],
                    'status' => $data['device_status'],
                    'package' => $data['package'],
                    'expired' => $data['expired'],
                    'messages' => $data['messages'],
                ];
            }
        }
        $announcement = Announcement::get()->all();
        return view('user.dashboard', compact(
            'user',
            'pegawai',
            'fonnteInfo',
            'totalPesanTerkirimBulanIni',
            'totalNotifPegawaiBulanIni',
            'totalPesanTerkirim',
            'announcement'
        ));
    }
    public function settings()
    {
        $user = Auth::guard('user')->user();
        $fonnteToken = $user->fonnte;

        $fonnteInfo = null;

        if ($fonnteToken) {
            $response = Http::withHeaders([
                'Authorization' => $fonnteToken,
            ])->post('https://api.fonnte.com/device');

            if ($response->successful() && $response->json('status')) {
                $data = $response->json();

                $fonnteInfo = [
                    'device' => $data['device'],
                    'name' => $data['name'],
                    'quota' => $data['quota'],
                    'status' => $data['device_status'],
                    'package' => $data['package'],
                    'expired' => $data['expired'],
                    'messages' => $data['messages'],
                ];
            }
        }
        return view('user.setting', compact('user', 'fonnteInfo'));
    }
    public function updateUserConfig(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();

        $validator = Validator::make($request->all(), [
            'apirul' => ['nullable', 'url'],
            'fonnte' => ['nullable', 'string'],
            'username_mpp' => ['nullable', 'string'],
            'password_mpp' => ['nullable', 'string'],
            'lokasi_mpp' => ['nullable', 'string', 'unique:users,lokasi_mpp,' . $user->id],
        ], [
            'lokasi_mpp.unique' => 'Lokasi MPP sudah digunakan oleh pengguna lain.',
            'apirul.url' => 'Format URL tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui konfigurasi!');
        }

        $user->api_url = $request->filled('apirul') ? $request->apirul : $user->api_url;
        $user->fonnte = $request->filled('fonnte') ? $request->fonnte : $user->fonnte;
        $user->username_mpp = $request->filled('username_mpp') ? $request->username_mpp : $user->username_mpp;
        $user->password_mpp = $request->filled('password_mpp') ? $request->password_mpp : $user->password_mpp;
        $user->lokasi_mpp = $request->filled('lokasi_mpp') ? $request->lokasi_mpp : $user->lokasi_mpp;
        $user->status = $request->has('active') ? 'active' : 'inactive';
        $user->save();

        return redirect()->back()->with('success', 'Konfigurasi berhasil diperbarui!');
    }
    public function pegawai()
    {
        $user = Auth::guard('user')->user();
        $pegawai = Pegawai::where('user_id', $user->id)->get();
        return view('user.pegawai', compact('user', 'pegawai'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'posisi' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        Pegawai::create($validated);
        return back()->with('success', 'Pegawai berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->back()->with('success', 'Pegawai berhasil dihapus!');
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:pegawais,id',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'posisi' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $pegawai = Pegawai::findOrFail($validated['id']);
        $pegawai->update([
            'nama' => $validated['nama'],
            'no_hp' => $validated['no_hp'],
            'posisi' => $validated['posisi'],
            'user_id' => $validated['user_id'],
        ]);

        return redirect()->back()->with('success', 'Data pegawai berhasil diupdate!');
    }
    public function pesan(Request $request)
    {
        $user = Auth::guard('user')->user();
        $query = Pesan::where('user_id', $user->id)
            ->with('pemohon');

        // Search by no_permohonan
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->whereHas('pemohon', function ($q) use ($searchTerm) {
                $q->where('no_permohonan', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // If no date filters are provided, default to current month
        if (!$request->filled('start_date') && !$request->filled('end_date')) {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        }

        $pesan = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('user.pesan', compact('user', 'pesan'));
    }

    public function pesanPegawai(Request $request)
    {
        $user = Auth::guard('user')->user();

        $query = NotifPegawai::where('user_id', $user->id);

        // Filter by nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Default: filter bulan ini kalau start/end date tidak diisi
        if (!$request->filled('start_date') && !$request->filled('end_date')) {
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        } else {
            // Filter by start date
            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', Carbon::parse($request->start_date));
            }

            // Filter by end date
            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', Carbon::parse($request->end_date));
            }
        }

        $pesan = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('user.pesanpeg', compact('user', 'pesan'));
    }

    public function profile()
    {
        $user = Auth::guard('user')->user();
        return view('user.profile', compact('user'));
    }
    public function profileStore(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'confirmpassword' => 'nullable|same:password',
        ], [
            'confirmpassword.same' => 'Konfirmasi password tidak cocok.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            Auth::guard('user')->logout();
            return redirect()->route('login')->with('success', 'Profile berhasil diupdate. Silakan login kembali.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui profil. Silakan coba lagi.');
    }
}
