<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomPesanController extends Controller
{
    /**
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
 */
    public function pesanPemohon(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();

        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                // reset pesan di database
                $user->update(['pesan_pemohon' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap {tahapan}.\nSilahkan cek secara berkala melalui Aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_']);
                return redirect()->back()->with('success', 'Pesan pemohon berhasil direset ke default!');
            }

            // validasi & simpan normal
            $request->validate([
                'isi_pesan' => 'string|max:500',
            ]);

            $user->update([
                'pesan_pemohon' => $request->isi_pesan,
            ]);

            return redirect()->back()->with('success', 'Pesan pemohon berhasil disimpan!');
        }

        return view('user.pesan-pemohon', compact('user'));
    }


    public function pesanPenyerahan(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();
        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                $user->update(['pesan_penyerahan' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap *{tahapan}*.\n Silahkan download dokumen SK di aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_']);
                return redirect()->back()->with('success', 'Pesan SK Diterbitkan berhasil direset ke default!');
            }
            $request->validate([
                'isi_pesan' => 'string|max:500',
            ]);
            $user->update([
                'pesan_penyerahan' => $request->isi_pesan,
            ]);
            return redirect()->back()->with('success', 'Pesan SK Diterbitkan berhasil disimpan!');
        }
        return view('user.pesan-penyerahan', compact('user'));
    }
    public function pesanDitolak(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();
        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                $user->update(['pesan_ditolak' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} ditolak, silahkan cek dokumen permohonan kembali melalui Aplikasi MPP Digital.\n\n_Pesan ini dikirim oleh {username}_']);
                return redirect()->back()->with('success', 'Pesan Permohonan Di tolak berhasil direset ke default!');
            }
            $request->validate([
                'isi_pesan' => 'string|max:500',
            ]);
            $user->update([
                'pesan_ditolak' => $request->isi_pesan,
            ]);
            return redirect()->back()->with('success', 'Pesan Permohonan Ditolak berhasil disimpan!');
        }
        return view('user.pesan-ditolak', compact('user'));
    }
    public function pesanIkm(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();
        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                $user->update(['pesan_ikm' => 'Hai Saudara/Saudari {nama}, dokumen permohonan perizinan *{nama_izin}* dengan Nomor Permohonan : {no_permohonan} saat ini sudah pada tahap *{tahapan}*.\n Silahkan isi survey IKM melalui Aplikasi MPP Digital agar dapat megunduh dokumen SK yang sudah ditetapkan.\n\n_Pesan ini dikirim oleh {username}_']);
                return redirect()->back()->with('success', 'Pesan Survey IKM berhasil direset ke default!');
            }
            $request->validate([
                'isi_pesan' => 'string|max:500',
            ]);
            $user->update([
                'pesan_ikm' => $request->isi_pesan,
            ]);
            return redirect()->back()->with('success', 'Pesan Survey IKM berhasil disimpan!');
        }
        return view('user.pesan-ikm', compact('user'));
    }

    public function pesanPegawai(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('user')->user();

        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                $user->update(['pesan_pegawai' => 'Notifikasi Permohonan *{tahapan}*\nNama: {nama_pemohon}\nPerihal: {nama_izin}\nNomor: {no_permohonan}\nTgl. Pengajuan: {created_at_wib}\n\nSilakan login ke website admin.mppdigital.go.id untuk {tahapan}.\n\n_Pesan ini dikirim oleh {username}_']);
                return redirect()->back()->with('success', 'Pesan pegawai berhasil direset ke default!');
            }
            $request->validate([
                'isi_pesan' => 'string|max:500',
            ]);
            $user->update([
                'pesan_pegawai' => $request->isi_pesan,
            ]);
            return redirect()->back()->with('success', 'Pesan penyerahan berhasil disimpan!');
        }

        return view('user.pesan-pegawai', compact('user'));
    }
}
