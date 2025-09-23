<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\OtpMail;
use App\Models\EmailVerification;
use App\Models\Package;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function signUp()
    {
        return view('user.signup');
    }
    public function index()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('about');
    }
    public function storeSignup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->email_verified_at) {
                return back()->withErrors(['email' => 'Email sudah terdaftar dan terverifikasi. Silakan login.']);
            } else {
                $otp = rand(100000, 999999);

                EmailVerification::updateOrCreate(
                    ['email' => $user->email],
                    ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
                );
                Mail::to($user->email)->send(new OtpMail($otp));

                return redirect()->route('signup.otp', ['email' => $user->email])
                    ->with('success', 'Email sudah terdaftar namun belum diverifikasi. OTP baru telah dikirim.');
            }
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 'inactive',
            'api_url' => 'https://admin.mppdigital.go.id',
            'pesan_pemohon' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap {tahapan}.\nSilahkan cek secara berkala melalui Aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_',
            'pesan_penyerahan' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap *{tahapan}*.\n Silahkan download dokumen SK di aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_',
            'pesan_ditolak' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} ditolak, silahkan cek dokumen permohonan kembali melalui Aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_',
            'pesan_ikm' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap *{tahapan}*.\n Silahkan isi survey IKM melalui Aplikasi MPP Digital agar dapat megunduh dokumen SK yang sudah ditetapkan.\n\n_Pesan ini dikirim oleh {username}_',
            'pesan_pegawai' => 'Notifikasi Permohonan *{tahapan}*\nNama: {nama_pemohon}\nPerihal: {nama_izin}\nNomor: {no_permohonan}\nTgl. Pengajuan: {created_at_wib}\n\nSilakan login ke website admin.mppdigital.go.id untuk {tahapan}.\n\n_Pesan ini dikirim oleh {username}_',
            'subscription_expires_at' => now()->addDays(7),
        ]);
        $otp = rand(100000, 999999);
        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
        );

        Mail::to($user->email)->queue(new OtpMail($otp));
        return redirect()->route('signup.otp', ['email' => $user->email])
            ->with('success', 'OTP telah dikirim ke email Anda.');
    }
    public function showOtp(Request $request)
    {
        return view('user.otp', ['email' => $request->email]);
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ]);
        $otp = EmailVerification::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return back()->with('error', 'OTP salah atau kadaluarsa.');
        }
        User::where('email', $request->email)->update(['status' => 'active']);
        User::where('email', $request->email)->update([
            'email_verified_at' => now(),
        ]);
        $otp->delete();
        return redirect()->route('login')->with('success', 'Verifikasi berhasil! Silakan login.');
    }
    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('email', $user->email)->first();
        if (!$otpData) {
            return redirect()->route('login')->with('error', 'Email sudah diverifikasi.');
        }
        if ($otpData->updated_at->diffInSeconds(now()) < 60) {
            return back()->with('error', 'Tunggu sebentar sebelum mengirim ulang OTP.');
        }
        $otp = rand(100000, 999999);
        $otpData->update([
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);
        Mail::to($user->email)->queue(new OtpMail($otp));
        return back()->with('success', 'OTP baru telah dikirim ke email Anda.');
    }
    public function forgotPass()
    {
        return view('user.forgot-pass');
    }
    public function pricing()
    {
        $packages = Package::where('visible', 'public')->get();
        return view('pricing', compact('packages'));
    }
}
