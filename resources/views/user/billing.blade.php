@extends('user.layout2')

@section('title', 'Subscription')
@section('meta_description',
    'Pilih paket langganan SINOMU sesuai kebutuhanmu. Tersedia paket Basic dan Premium dengan
    fitur lengkap untuk pengelolaan data yang lebih canggih.')
@section('og_description',
    'Nikmati fitur premium dari SINOMU dengan berlangganan paket pilihan. Praktis, cepat, dan
    aman dengan pembayaran online Midtrans.')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-base-200 to-base-300">
        <div class="wadb1 borderbc1">
            <div class="px-6 py-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg wadbo3 flex items-center justify-center">
                        <svg class="w-5 h-5 wad4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold wad4">Subscriptions</h1>
                        <p class="text-white">Kelola langganan dan riwayat pembayaran Anda</p>
                    </div>
                </div>
            </div>
        </div>
        <input type="checkbox" id="buy-package-modal" class="modal-toggle" />
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box max-w-4xl wadb4 shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold wad1 flex items-center gap-2">
                        <svg class="w-6 h-6 wad1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        Pilih Paket Langganan
                    </h3>
                    <label for="buy-package-modal" class="btn btn-sm btn-circle btnprimarys">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse ($packages as $index => $package)
                        <div
                            class="card wadb1 shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:scale-105 borderprimary">
                            <div class="card-body relative">
                                <div class="absolute -top-4 -right-4 w-20 h-20 wadb3 rounded-full opacity-55"></div>
                                <div class="absolute -bottom-6 -left-6 w-16 h-16 wadb3 rounded-full"></div>

                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-xl wadbo3 flex items-center justify-center">
                                        <svg class="w-6 h-6 wad4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $index % 2 == 0 ? 'M13 10V3L4 14h7v7l9-11h-7z' : 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z' }}" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold text-white">{{ $package->name }}</h4>
                                    </div>
                                </div>

                                <p class="text-white mb-4">{{ $package->description }}</p>

                                <div class="flex items-baseline gap-1 mb-6">
                                    <span class="text-3xl font-bold wad4">Rp
                                        {{ number_format($package->price) }}</span>
                                    <span class="text-white">/ {{ $package->duration_days }} hari</span>
                                </div>

                                <div class="card-actions justify-end">
                                    <form method="POST" action="{{ route('billing.pay') }}">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                        <button
                                            class="btn btnsecondarys btn-block shadow-lg hover:shadow-xl transition-all duration-300">Langganan
                                            Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Paket tidak tersedia</p>
                    @endforelse
                </div>
            </div>
            <label class="modal-backdrop" for="buy-package-modal">Close</label>
        </div>
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <label for="buy-package-modal"
                    class="btn btnprimarys btn-lg shadow-xl hover:shadow-2xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Beli Paket
                </label>
            </div>
            <div class="card bg-base-100 shadow-2xl border border-base-300">
                <div class="card-body p-0">
                    <div class="wadb4 p-6 borderinaja">
                        <h2 class="text-2xl font-bold wad1 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg wadb2 flex items-center justify-center">
                                <svg class="w-4 h-4 wad4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            Riwayat Subscriptions
                        </h2>
                        <p class="text-black mt-1">Kelola dan pantau semua transaksi pembayaran Anda</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead class="bg-base-200/50">
                                <tr>
                                    <th class="font-bold text-base-content">
                                        <div class="flex items-center gap-2">
                                            Invoice ID
                                        </div>
                                    </th>
                                    <th class="font-bold text-base-content">
                                        <div class="flex items-center gap-2">
                                            Invoice Date
                                        </div>
                                    </th>
                                    <th class="font-bold text-base-content">
                                        <div class="flex items-center gap-2">
                                            Total
                                        </div>
                                    </th>
                                    <th class="font-bold text-base-content text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            Status
                                        </div>
                                    </th>
                                    <th class="font-bold text-base-content">
                                        <div class="flex items-center gap-2">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($billing as $p)
                                    <tr class="hover:bg-base-200/30 group">
                                        <td class="py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="font-bold text-base-content">#{{ $p->id }}</div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="flex flex-col">
                                                <span
                                                    class="font-medium text-base-content">{{ date('d M Y', strtotime($p->start_date)) }}</span>
                                                <span
                                                    class="text-xs text-base-content/60">{{ date('H:i', strtotime($p->start_date)) }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <div class="flex items-center gap-1">
                                                <span class="text-lg font-bold wad2">Rp
                                                    {{ number_format($p->total) }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 text-center">
                                            @php
                                                $statusConfig = match ($p->status) {
                                                    'success' => [
                                                        'class' => 'badge-success',
                                                        'text' => 'Terbayar',
                                                        'icon' => 'M5 13l4 4L19 7',
                                                    ],
                                                    'pending' => [
                                                        'class' => 'badge-warning',
                                                        'text' => 'Pending',
                                                        'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                                    ],
                                                    'failed' => [
                                                        'class' => 'badge-error',
                                                        'text' => 'Gagal',
                                                        'icon' => 'M6 18L18 6M6 6l12 12',
                                                    ],
                                                    default => [
                                                        'class' => 'badge-neutral',
                                                        'text' => ucfirst($p->status),
                                                        'icon' =>
                                                            'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                                    ],
                                                };
                                            @endphp
                                            <div class="badge {{ $statusConfig['class'] }} gap-2 font-semibold shadow-sm">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $statusConfig['icon'] }}" />
                                                </svg>
                                                {{ $statusConfig['text'] }}
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <a href="{{ route('billing.status', ['payToken' => $p->payment_token]) }}"
                                                class="btn btnprimarys text-white">Lihat</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-16">
                                            <div class="flex flex-col items-center gap-4 text-base-content">
                                                <div
                                                    class="w-24 h-24 rounded-full bg-base-300 flex items-center justify-center">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1"
                                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <p class="font-bold text-black text-lg mb-2">Belum ada riwayat
                                                        billing
                                                    </p>
                                                    <p class="text-base-content mb-4">Mulai berlangganan untuk melihat
                                                        riwayat pembayaran Anda</p>
                                                    <label for="buy-package-modal" class="btn btnprimarys btn-sm">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                        </svg>
                                                        Pilih Paket
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($billing->hasPages())
                <div class="flex flex-col items-center gap-4 mt-8">
                    <div class="join shadow-lg bg-base-100 rounded-xl">
                        @if ($billing->onFirstPage())
                            <button class="join-item btn btn-disabled">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                        @else
                            <a href="{{ $billing->appends(request()->query())->previousPageUrl() }}"
                                class="join-item btn hover:btn-primary transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                        @endif

                        @foreach ($billing->appends(request()->query())->getUrlRange(1, $billing->lastPage()) as $page => $url)
                            @if ($page == $billing->currentPage())
                                <button class="join-item btn btn-primary">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}"
                                    class="join-item btn hover:btn-primary transition-colors duration-200">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($billing->hasMorePages())
                            <a href="{{ $billing->appends(request()->query())->nextPageUrl() }}"
                                class="join-item btn hover:btn-primary transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @else
                            <button class="join-item btn btn-disabled">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        @endif
                    </div>

                    <div class="text-center text-sm text-base-content/70 bg-base-100 px-4 py-2 rounded-full shadow-sm">
                        Menampilkan {{ $billing->firstItem() }} - {{ $billing->lastItem() }} dari {{ $billing->total() }}
                        hasil
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="toast toast-top toast-end z-50" id="toastContainer"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                showToast('error', "{{ session('error') }}", 'Error');
            @endif

            @if (session('success'))
                showToast('success', "{{ session('success') }}", 'Success');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    showToast('error', "{{ $error }}", 'Validation Error');
                @endforeach
            @endif
        });

        function showToast(type, message, title = '') {
            const toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) return;

            const alertClass = type === 'error' ? 'alert-error' :
                type === 'success' ? 'alert-success' :
                type === 'warning' ? 'alert-warning' : 'alert-info';

            const gradientClass = type === 'error' ? 'from-red-500 to-red-600' :
                type === 'success' ? 'from-green-500 to-green-600' :
                type === 'warning' ? 'from-yellow-500 to-yellow-600' : 'from-blue-500 to-blue-600';

            const icon = type === 'error' ?
                '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
                type === 'success' ?
                '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
                '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';

            const toast = document.createElement('div');
            toast.className = `relative mb-4 animate-in slide-in-from-right duration-300`;
            toast.innerHTML = `
                    <div class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-2xl shadow-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r ${gradientClass} opacity-10"></div>
                        <div class="relative p-4 flex items-start gap-4">
                            <div class="p-2 bg-gradient-to-br ${gradientClass} rounded-xl text-white flex-shrink-0">
                                ${icon}
                            </div>
                            <div class="flex-1 min-w-0">
                                ${title ? `<div class="font-bold text-slate-800 mb-1">${title}</div>` : ''}
                                <div class="text-slate-600 text-sm leading-relaxed">${message}</div>
                            </div>
                            <button class="btn btn-ghost btn-sm btn-circle hover:bg-slate-100 flex-shrink-0" onclick="this.closest('.animate-in').remove()">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
            toastContainer.appendChild(toast);
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.classList.add('animate-out', 'slide-out-to-right');
                    setTimeout(() => toast.remove(), 300);
                }
            }, 4000);
        }
        document.querySelectorAll('a[href*="langganan"], a[href*="subscribe"]').forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.href === '#') {
                    e.preventDefault();
                    return;
                }

                const originalText = this.innerHTML;
                this.innerHTML = `
                    <span class="loading loading-spinner loading-sm mr-2"></span>
                    Memproses...
                `;
                this.classList.add('btn-disabled');
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-disabled');
                }, 3000);
            });
        });
        document.documentElement.style.scrollBehavior = 'smooth';
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const ripple = document.createElement('span');
                ripple.className = 'absolute rounded-full bg-white/30 animate-ping';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.width = '10px';
                ripple.style.height = '10px';
                ripple.style.transform = 'translate(-50%, -50%)';
                ripple.style.pointerEvents = 'none';

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>

@endsection
