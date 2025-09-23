<x-layout>
    @section('title', 'About')
    @section('meta_description',
        'Pelajari lebih lanjut tentang SINOMU, sistem notifikasi otomatis yang mempermudah
        proses komunikasi antara pegawai dan pemohon. Efisien, cepat, dan andal.')
    @section('og_description',
        'SINOMU adalah sistem notifikasi otomatis berbasis WhatsApp yang membantu instansi
        menyampaikan informasi penting dengan cepat dan tepat waktu.')
        <section class="bg-base-300 py-16 px-6 md:px-20">
            <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center overflow-hidden">
                <div class="order-2 md:order-1" data-aos="fade-right" data-aos-duration="800">
                    <img src="{{ asset('image/team-page.svg') }}" alt="Ilustrasi build web"
                        class="w-full h-auto rounded-xl shadow-lg wadb4" loading="lazy" />
                </div>

                <div class="order-1  md:order-2" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Tentang {{ config('app.name') }}</h2>
                    <p class="text-black leading-relaxed mb-6 font-semibold">
                        {{ config('app.name') }} adalah sistem notifikasi otomatis yang dirancang untuk mempercepat
                        sekaligus menyederhanakan alur pelayanan publik.
                        Melalui integrasi dengan WhatsApp, {{ config('app.name') }} memastikan setiap pegawai dan pemohon
                        menerima informasi dengan cepat, jelas, dan tepat waktu.

                        Dengan notifikasi yang berjalan otomatis tanpa perlu input manual, admin dapat lebih fokus pada
                        tugas-tugas penting lainnya.
                        Sistem ini juga membantu meminimalkan keterlambatan, mencegah miskomunikasi, serta meningkatkan
                        akuntabilitas di setiap tahapan proses.

                        Dilengkapi antarmuka sederhana dan ringan, {{ config('app.name') }} dapat digunakan dengan mudah
                        oleh berbagai instansi, termasuk yang memiliki keterbatasan sumber daya teknis.
                    </p>
                </div>
            </div>
        </section>
    </x-layout>
