@extends('user.layout3')

@section('title', 'Getting Started')

@section('meta_description',
    'Mulai gunakan Sinomu dengan panduan singkat ini. Pelajari cara setup awal, konfigurasi
    unit, dan tips cepat untuk menjalankan sistem secara optimal.')

@section('og_description',
    'Panduan lengkap untuk memulai penggunaan Sinomu. Ikuti langkah-langkah mudah untuk mengatur
    akun, dan fitur utama dengan cepat dan efisien.')

@section('content')
    <div class="px-4 py-6 wadb4">
        <div class="card wadb1 shadow-yellow-800 shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-3xl font-bold wad4 mb-4">
                    <svg class="w-8 h-8 wad4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                        </path>
                    </svg>
                    Getting Started
                </h1>

                <div class="alert alert-info mb-6 font-semibold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Halaman ini berisi panduan singkat untuk memulai penggunaan Sinomu. Ikuti setiap langkah sesuai
                        urutan.</span>
                </div>

                <div class="space-y-4">
                    <div class="collapse collapse-arrow wadb4">
                        <input type="radio" name="getting-started-accordion" checked="checked" />
                        <div class="collapse-title text-xl font-medium flex items-center gap-3">
                            <div class="badge wadb1 wad4 badge-lg">1</div>
                            <strong class="wad1">Registrasi Akun</strong>
                        </div>
                        <div class="collapse-content">
                            <p class="mb-4 font-semibold">
                                Buka halaman <a href="{{ route('signup') }}" title="Sign Up"
                                    class="link wad3 font-semibold">Sign
                                    Up</a>
                                dan buat akun baru dengan mengisi email dan password yang valid.
                            </p>
                            <div class="flex gap-2">
                                <a href="{{ route('signup') }}" title="Sign Up"
                                    class="btn btnprimarys shadow-md shadow-yellow-800 hover:shadow-xl btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                        </path>
                                    </svg>
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow wadb4">
                        <input type="radio" name="getting-started-accordion" />
                        <div class="collapse-title text-xl font-medium flex items-center gap-3">
                            <div class="badge wadb1 wad4 badge-lg">2</div>
                            <strong class="wad1">Login ke Sistem</strong>
                        </div>
                        <div class="collapse-content">
                            <p class="mb-4 font-semibold">
                                Setelah berhasil melakukan registrasi, silakan masuk ke sistem melalui
                                <a href="{{ route('login') }}" title="Login" class="link wad3 font-semibold">Login</a>.
                            </p>
                            <div class="flex gap-2">
                                <a href="{{ route('login') }}" title="Login"
                                    class="btn btnprimarys shadow-md shadow-yellow-800 hover:shadow-xl btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow wadb4">
                        <input type="radio" name="getting-started-accordion" />
                        <div class="collapse-title text-xl font-medium flex items-center gap-3">
                            <div class="badge wadb1 wad4 badge-lg">3</div>
                            <strong class="wad1">Lengkapi Data</strong>
                        </div>
                        <div class="collapse-content">
                            <p class="mb-4 font-semibold">
                                Mulailah dengan menambahkan informasi <a href="{{ route('user.pegawai') }}"
                                    class="link wad3" title="pegawai">Pegawai</a>.
                                Jika diperlukan, Anda juga dapat menyesuaikan pesan notifikasi melalui menu
                                <a href="{{ route('custom.pesan.pemohon') }}" class="link wad3" title="custom pesan">Custom
                                    Pesan</a> dengan memilih jenis pesan yang ingin diedit.
                                Sebagai langkah akhir, lengkapi data profil pengguna di menu
                                <a href="{{ route('setting.user') }}" class="link wad3" title="pengaturan">Pengaturan</a>.
                            </p>
                            <div class="alert alert-warning mb-4 font-semibold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                                <span>
                                    Pastikan data pegawai, pesan, dan profil telah diperbarui dengan benar agar sistem dapat
                                    berjalan optimal.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow wadb4">
                        <input type="radio" name="getting-started-accordion" />
                        <div class="collapse-title text-xl font-medium flex items-center gap-3">
                            <div class="badge wadb1 wad4 badge-lg">4</div>
                            <strong class="wad1">Uji Coba Aplikasi</strong>
                        </div>
                        <div class="collapse-content">
                            <p class="mb-4 font-semibold">
                                Setelah semua data terisi, sistem akan otomatis berjalan melalui cronjob. Jika notifikasi
                                tidak muncul, periksa kembali pengaturan dan data pegawai Anda.
                            </p>
                            <div class="alert alert-warning mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-semibold">
                                    Apabila notifikasi belum diterima, Anda bisa menghubungi
                                    <a href="https://wa.me/6285175112406" target="_blank" title="Hubungi Support"
                                        class="link wad3 font-semibold">Support</a> untuk bantuan.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider mt-8"></div>

                <div class="card wadb4 mt-6">
                    <div class="card-body text-center">
                        <h3 class="card-title justify-center wad1 text-xl mb-2">
                            Butuh Bantuan?
                        </h3>
                        <p class="mb-4 font-semibold">Jika mengalami kendala, silakan hubungi tim support kami.</p>
                        <div class="card-actions justify-center">
                            <a href="https://wa.me/6285175112406" target="_blank" title="Hubungi Support"
                                class="btn btnprimarys shadow-lg shadow-yellow-800 hover:shadow-xl font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z">
                                    </path>
                                </svg>
                                Hubungi Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
