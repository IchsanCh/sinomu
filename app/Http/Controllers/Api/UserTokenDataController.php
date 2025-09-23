<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTokenDataController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->get('authenticated_user');

        $formattedDate = $user->subscription_expires_at
            ? $user->subscription_expires_at->locale('id')->translatedFormat('d F Y H:i')
            : null;

        $pegawais = $user->pegawais()->get(['id', 'nama', 'no_hp', 'posisi']);

        return response()->json([
            'status' => 'success',
            'message' => 'Data user berhasil diambil.',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'api_url' => $user->api_url,
                'username_mpp' => $user->username_mpp,
                'password_mpp' => $user->password_mpp,
                'lokasi_mpp' => $user->lokasi_mpp,
                'pesan_pemohon' => str_replace('\\n', "\n", $user->pesan_pemohon),
                'pesan_penyerahan' => str_replace('\\n', "\n", $user->pesan_penyerahan),
                'pesan_pegawai' => str_replace('\\n', "\n", $user->pesan_pegawai),
                'status' => $user->status,
                'subscription_expires_at' => $formattedDate,
                'pegawais' => $pegawais,
            ],
        ]);
    }
}
