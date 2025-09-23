<x-layout>
    @section('title', 'Pricing')
    @section('meta_description',
        'Lihat paket harga Sinomu yang fleksibel untuk berbagai kebutuhan instansi. Mulai dari
        notifikasi otomatis harian hingga sistem pelaporan terjadwal.')
    @section('og_description',
        'Temukan paket harga Sinomu yang cocok untuk instansimu. Layanan notifikasi WhatsApp
        otomatis yang cepat, tepat, dan terintegrasi dengan API instansi.')

        <section class="min-h-screen wadb4 py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h1 class="text-3xl lg:text-6xl font-black wad1 mb-8" data-aos="fade-up" data-aos-duration="700">
                        Paket Langganan Sinomu
                    </h1>
                    <p class="text-xl font-semibold lg:text-2xl mb-8 text-black max-w-3xl mx-auto leading-relaxed"
                        data-aos="fade-up" data-aos-duration="800">
                        Sesuaikan paket dengan kebutuhan instansi Anda. Semua paket mendukung notifikasi WhatsApp otomatis
                        dan integrasi sistem eksternal.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                    @forelse ($packages as $index => $p)
                        <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="700">
                            <div
                                class="card wadb1 shadow-2xl shadow-yellow-800 hover:shadow-3xl borderprimarys transition-all duration-300 group-hover:-translate-y-3 relative overflow-hidden h-full">
                                @if ($index === 1)
                                    <div
                                        class="absolute -top-4 -right-4 w-24 h-24 wadbo3 rounded-full flex items-center justify-center rotate-12">
                                        <span class="text-xs font-bold wad4 -rotate-12">POPULAR</span>
                                    </div>
                                @endif

                                <div class="card-body p-8 relative z-10 flex flex-col h-full">
                                    <div
                                        class="w-20 h-20 wadb4 rounded-3xl flex items-center justify-center mb-6 mx-auto shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-10 h-10 wad1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>

                                    <h2 class="card-title text-2xl lg:text-3xl font-black justify-center mb-4 wad4">
                                        {{ $p->name }}
                                    </h2>

                                    <div class="text-center mb-4">
                                        <div class="flex items-center justify-center gap-2 mb-2">
                                            <span class="text-lg wad4 line-through font-medium">
                                                Rp {{ number_format($p->price / 0.8, 0, ',', '.') }}
                                            </span>
                                            <div class="badge badge-warning font-semibold badge-sm">-20%</div>
                                        </div>
                                        <div class="text-3xl lg:text-4xl font-black text-warning mb-2">
                                            Rp {{ number_format($p->price, 0, ',', '.') }}
                                        </div>
                                        <div class="text-sm uppercase tracking-wide font-bold text-warning mb-2">
                                            🎉 Discount Awal Launching 🎉
                                        </div>
                                        <div class="text-base text-white font-medium">
                                            per {{ $p->duration_days }} hari
                                        </div>
                                    </div>
                                    <p class="text-white text-center mb-6 leading-relaxed flex-grow">
                                        {{ $p->description }}
                                    </p>
                                    <div class="space-y-4 mb-8">
                                        <div class="flex items-center gap-3">
                                            <div class="w-6 h-6 bg-success rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-success-content" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-medium text-white">Notifikasi WhatsApp
                                                Otomatis</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="w-6 h-6 bg-success rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-success-content" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-medium text-white">Integrasi MPP Digital
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-actions justify-center mt-auto">
                                        <a href="{{ route('user.billing') }}" title="Pilih Paket {{ $p->name }}"
                                            class="btn {{ $index === 1 ? 'btnsecondarys' : 'btnsecondarys' }} btn-lg w-full font-bold text-base group-hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                            @if ($index === 1)
                                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                            Pilih Paket Ini
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full" data-aos="fade-up" data-aos-duration="700">
                            <div class="card wadb1 shadow-2xl max-w-md mx-auto">
                                <div class="card-body text-center p-12">
                                    <div
                                        class="w-24 h-24 wadbo3 rounded-full flex items-center justify-center mb-8 mx-auto shadow-lg">
                                        <svg class="w-12 h-12 wad4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <h2 class="card-title text-2xl font-bold justify-center mb-6 wad4">
                                        Tidak ada paket yang tersedia
                                    </h2>
                                    <p class="text-white font-medium mb-8 leading-relaxed">
                                        Silakan hubungi admin untuk informasi lebih lanjut tentang paket yang tersedia.
                                    </p>
                                    <a href="https://wa.me/6285175112406" target="_blank" title="Hubungi Admin"
                                        class="btn btnprimarys font-bold shadow-lg shadow-yellow-800 hover:shadow-xl transition-all">
                                        <i class="fa-brands fa-whatsapp text-lg"></i>
                                        Hubungi Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="text-center">
                    <div class="wadb1 p-8 lg:p-12" style="border-radius: 1.5rem;">
                        <h3 class="text-3xl lg:text-4xl font-bold mb-4 wad4">Siap Tingkatkan Layanan Instansi Anda?
                        </h3>
                        <p class="text-lg text-white mb-8 max-w-2xl mx-auto font-semibold">
                            Beralih ke sistem notifikasi otomatis WhatsApp bersama SINOMU. Cepat, aman, dan mudah
                            terintegrasi dengan sistem instansi Anda.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="/docs/getting-started" title="Get Started"
                                class="btn btnprimarys px-10 font-bold shadow-lg hover:shadow-xl shadow-yellow-800 transition-shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                                Get Started
                            </a>
                            <a href="https://wa.me/6285175112406" target="_blank" class="btn btnsecondarys px-8"
                                title="Konsultasi Gratis">
                                <i class="fa-brands fa-whatsapp"></i> Konsultasi Gratis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-layout>
