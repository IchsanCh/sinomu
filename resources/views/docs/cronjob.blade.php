@extends('user.layout3')

@section('title', 'Sinkronisasi Data')

@section('meta_description',
    'Dokumentasi jadwal cronjob pada sistem Sinomu. Menjelaskan waktu pengiriman pesan otomatis,
    proses sinkronisasi data, serta penghapusan log secara terjadwal.')

@section('og_description',
    'Panduan lengkap mengenai jadwal cronjob di Sinomu. Pelajari kapan sistem menjalankan
    pengiriman pesan, sinkronisasi data pegawai, dan penghapusan log lama secara otomatis.')


@section('content')
    <div class="mx-auto p-6 wadb4">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-2 wad1">Jadwal Cronjob & Sinkronisasi Data</h1>
            <p class="text-base-content text-lg">Sistem otomatisasi dan penjadwalan untuk efisiensi maksimal</p>
        </div>
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
            <div class="card w-full wadb1 shadow-lg shadow-yellow-800 hover:shadow-xl transition-all duration-300">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="wadbo3 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 wad4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                        </div>
                        <h2 class="card-title text-xl wad4">Pengiriman ke Pegawai</h2>
                    </div>

                    <div class="space-y-4 font-semibold">
                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                            <span>Pengiriman otomatis saat ada pemohon baru</span>
                        </div>

                        <div class="divider text-white">Jadwal Harian</div>

                        <div class="flex items-center gap-3 p-3 wadb4 rounded-lg">
                            <div class="badge badge-warning">06:57</div>
                            <span class="text-sm text-black">Reset status pengiriman</span>
                        </div>

                        <div class="flex items-center gap-3 p-3 wadb4 rounded-lg">
                            <div class="badge badge-warning">07:00</div>
                            <span class="text-sm text-black">Kirim pesan pengingat rutin</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-full wadb1 shadow-lg shadow-yellow-800 hover:shadow-xl transition-all duration-300">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="wadbo3 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 wad4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </div>
                        <h2 class="card-title text-xl wad4">Pengiriman ke Pemohon</h2>
                    </div>

                    <div class="space-y-4 font-semibold">
                        <div class="stat wadb4 rounded-lg">
                            <div class="stat-title text-black">Interval Pembaruan</div>
                            <div class="stat-value text-2xl wad3">5 Menit</div>
                            <div class="text-black">Pembaruan data otomatis</div>
                        </div>

                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                            <span class="text-sm">Pesan dikirim hanya untuk data baru atau perubahan tahapan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-full wadb1 shadow-lg shadow-yellow-800 hover:shadow-xl transition-all duration-300">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="wadbo3 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 wad4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </div>
                        <h2 class="card-title text-xl wad4">Jeda Mingguan</h2>
                    </div>

                    <div class="space-y-4 font-semibold">
                        <div class="stat wadb4 rounded-lg">
                            <div class="stat-title text-black">Jadwal Jeda</div>
                            <div class="stat-value text-2xl wad3">Sabtu & Minggu</div>
                            <div class="text-black">Cronjob dihentikan sementara setiap akhir pekan
                            </div>
                        </div>

                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                            <span class="text-sm">Website tetap dapat diakses, hanya proses otomatis (cronjob) yang berhenti
                                sementara.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-full wadb1 shadow-lg shadow-yellow-800 hover:shadow-xl transition-all duration-300">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="wadbo3 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 wad4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                        <h2 class="card-title text-xl wad4">Penghapusan Otomatis</h2>
                    </div>

                    <div class="space-y-4 font-semibold">
                        <div class="stat wadb4 rounded-lg">
                            <div class="stat-title text-black">Retensi Data</div>
                            <div class="stat-value text-2xl wad3">3 Bulan</div>
                            <div class="text-black">Otomatis dihapus</div>
                        </div>

                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                            <span class="text-sm">Data pesan lama dihapus untuk menjaga performa sistem</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <div class="card wadb1 shadow-lg shadow-yellow-800 hover:shadow-xl transition-all duration-300">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="wadbo3 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 wad4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <h2 class="card-title text-xl wad4">Catatan Penting</h2>
                    </div>

                    <div class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-current shrink-0 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">Semua jadwal cronjob mengikuti zona waktu <span
                                    class="font-bold">WIB (UTC+7)</span>.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
