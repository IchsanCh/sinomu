@extends('user.layout2')
@section('title', 'Payment Status')
@section('meta_description',
    'Lihat detail status pembayaran paket langganan SINOMU. Cek invoice, metode pembayaran, dan
    pastikan transaksimu berhasil diproses dengan aman.')
@section('og_description',
    'Pantau status pembayaran langganan SINOMU. Invoice lengkap, praktis, dan aman dengan sistem
    pembayaran online Midtrans.')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-base-200 to-base-300 p-4">
        <div class="max-w-3xl mx-auto py-8">
            <div class="text-center mb-8">
                @if ($subscription->status === 'success')
                    <div class="w-20 h-20 mx-auto mb-4 bg-success rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-success mb-2">Pembayaran Berhasil</h1>
                    <p class="text-base-content font-semibold">Terima kasih! Transaksi Anda telah berhasil diproses</p>
                @elseif ($subscription->status === 'failed')
                    <div class="w-20 h-20 mx-auto mb-4 bg-error rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-error mb-2">Pembayaran Gagal</h1>
                    <p class="text-base-content font-semibold">Maaf, pembayaran tidak dapat diproses</p>
                @else
                    <div class="w-20 h-20 mx-auto mb-4 bg-warning rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-warning mb-2">{{ ucfirst($subscription->status) }}</h1>
                    <p class="text-base-content font-semibold">Status pembayaran Anda sedang diproses</p>
                @endif
            </div>

            <div class="card bg-white shadow-lg">
                <div class="card-body p-0">
                    <div class="wadb1 text-white p-6 rounded-t-2xl">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h2 class="text-xl font-bold wad4">Invoice ID</h2>
                                <p class="text-sm">
                                    {{ $subscription->payment_token ?? '-' }}
                            </div>
                            <div class="text-right hidden md:block">
                                <p class="text-sm font-semibold wad4">Invoice Date</p>
                                <p class="font-mono font-bold">
                                    {{ $subscription->created_at ? $subscription->created_at->format('d F Y') : '-' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-b">
                        <h3 class="font-semibold text-lg mb-4">Paket Berlangganan</h3>
                        <div class="bg-base-100 rounded-lg">
                            <div class="flex flex-row justify-between items-center gap-4">
                                <div class="flex-1">
                                    <h4 class="font-bold wad1 text-lg">{{ $subscription->package->name ?? '-' }}
                                    </h4>
                                    <p class="text-sm text-base-content font-semibold mt-1">
                                        {{ $subscription->package->description ?? '-' }}</p>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="badge wadb2 font-semibold wad4">
                                            {{ $subscription->package->duration_days ?? '-' }}
                                            Hari</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold wad1">
                                        Rp{{ number_format($subscription->total ?? 0, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-b">
                        <h3 class="font-semibold text-lg mb-4">Ringkasan Pembayaran</h3>
                        <div class="space-y-3 font-semibold">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>Rp{{ number_format($subscription->total ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Biaya Admin</span>
                                <span>Rp0</span>
                            </div>
                            <div class="divider my-2"></div>
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="wad1">Rp{{ number_format($subscription->total ?? 0, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Status Pembayaran</span>
                            <div
                                class="badge {{ $subscription->status === 'success' ? 'badge-success' : ($subscription->status === 'pending' ? 'badge-warning' : 'badge-error') }} badge-lg font-bold text-white">
                                {{ strtoupper($subscription->status) }}
                            </div>
                        </div>
                        <div class="flex md:hidden  items-center justify-between">
                            <span class="font-semibold">Invoice Date</span>
                            <span class="font-semibold">
                                {{ $subscription->created_at ? $subscription->created_at->format('d F Y') : '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 mt-8 justify-center">
                <a href="{{ route('user.billing') }}" class="btn btnprimarys btn-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Billing
                </a>
            </div>
        </div>
    </div>
@endsection
