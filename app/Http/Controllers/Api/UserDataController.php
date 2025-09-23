<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserDataController extends Controller
{
    public function index()
    {
        $users = User::with(['pegawais:id,user_id,nama,no_hp,posisi'])->get();
        $filteredUsers = $users->filter(function ($user) {
            return $user->status === 'active' &&
                Carbon::parse($user->subscription_expires_at)->isFuture();
        });
        if ($filteredUsers->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada user aktif atau langganan sudah kedaluwarsa.',
                'data' => [],
            ], 404);
        }
        $data = $filteredUsers->map(function ($user) {
            return [
                'id' => $user->id,
                'username' => $user->name,
                'api_url' => $user->api_url,
                'username_mpp' => $user->username_mpp,
                'password_mpp' => $user->password_mpp,
                'lokasi_mpp' => $user->lokasi_mpp,
                'fonnte_token' => $user->fonnte,
                'pesan_pemohon' => str_replace('\\n', "\n", $user->pesan_pemohon),
                'pesan_penyerahan' => str_replace('\\n', "\n", $user->pesan_penyerahan),
                'pesan_ditolak' => str_replace('\\n', "\n", $user->pesan_ditolak),
                'pesan_ikm' => str_replace('\\n', "\n", $user->pesan_ikm),
                'pesan_pegawai' => str_replace('\\n', "\n", $user->pesan_pegawai),
                'pegawais' => $user->pegawais->map(function ($pegawai) {
                    return [
                        'nama' => $pegawai->nama,
                        'no_hp' => $pegawai->no_hp,
                        'posisi' => $pegawai->posisi,
                    ];
                })->values(),
            ];
        })->values();
        return response()->json([
            'status' => 'success',
            'message' => 'Data user berhasil diambil.',
            'data' => $data,
        ], 200);
    }
}
