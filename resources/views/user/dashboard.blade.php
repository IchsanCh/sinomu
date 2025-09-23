@extends('user.layout2')

@section('title', 'Dashboard')
@section('meta_description',
    'Kelola notifikasi otomatis berbasis WhatsApp dengan SINOMU, sistem notifikasi terintegrasi
    MPP Digital untuk mempermudah layanan publik.')
@section('og_description',
    'SINOMU adalah sistem notifikasi WhatsApp otomatis yang terhubung dengan MPP Digital.
    Mudahkan masyarakat memantau layanan tanpa repot.')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4 lg:p-6">
        <div class="mb-8 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10 rounded-3xl blur-xl"></div>
            <div class="relative bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-2xl">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="space-y-3">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h1
                                    class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-slate-800 to-slate-600 bg-clip-text text-transparent">
                                    Hello, <span class="tooltip tooltip-bottom text-black" data-tip="{{ $user->name }}">
                                        {{ Str::limit($user->name, 20) }}
                                    </span>! 👋
                                </h1>
                                <p class="text-slate-600 text-lg">Selamat datang kembali di Dashboard
                                    <span
                                        class="font-semibold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent uppercase">{{ config('app.name') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center gap-2 px-4 py-3 rounded-2xl {{ $user->status === 'active' ? 'bg-gradient-to-r from-emerald-500 to-green-500' : 'bg-gradient-to-r from-red-400 to-red-500' }} text-white shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                @if ($user->status === 'active')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                @endif
                            </svg>
                            <span
                                class="font-semibold">{{ $user->status === 'active' ? 'System Online' : 'System Offline' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur-lg opacity-25 group-hover:opacity-40 transition-opacity">
                </div>
                <div
                    class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-600">Pesan Terkirim</h3>
                            </div>
                            <p class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"
                                id="totalMessages">
                                {{ $totalPesanTerkirim ?? '0' }}
                            </p>
                            <p class="text-sm text-slate-500">Bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl blur-lg opacity-25 group-hover:opacity-40 transition-opacity">
                </div>
                <div
                    class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-600">Total Pegawai</h3>
                            </div>
                            <p
                                class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                                {{ $pegawai->count() ?? '0' }}</p>
                            <p class="text-sm text-slate-500">Terdaftar</p>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl">
                            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-amber-500 to-orange-600 rounded-3xl blur-lg opacity-25 group-hover:opacity-40 transition-opacity">
                </div>
                <div
                    class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-600">Sisa Pesan</h3>
                            </div>
                            <p class="text-3xl font-bold bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent"
                                id="remainingMessages">
                                {{ $fonnteInfo['quota'] ?? 'Invalid' }}
                            </p>
                            <p class="text-sm text-slate-500">Fonnte: {{ $fonnteInfo['package'] ?? 'Invalid Token' }}
                            </p>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-amber-100 to-orange-100 rounded-2xl">
                            <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
            <div class="xl:col-span-2 group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-3xl blur-xl">
                </div>
                <div
                    class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500">
                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-3 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h2
                                class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                Pengumuman Terakhir
                            </h2>
                        </div>

                        <div class="space-y-4 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                            @forelse ($announcement as $a)
                                <div class="group/item relative">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-slate-100/50 to-slate-200/50 rounded-2xl opacity-0 group-hover/item:opacity-100 transition-opacity">
                                    </div>
                                    <div
                                        class="relative p-6 bg-white/70 backdrop-blur-sm border border-slate-200/50 rounded-2xl hover:shadow-lg transition-all duration-300">
                                        <h3 class="text-lg font-bold text-slate-800 mb-3 flex items-start gap-2">
                                            <span class="w-2 h-2 bg-indigo-500 rounded-full mt-2 animate-pulse"></span>
                                            {{ $a->name }}
                                        </h3>
                                        <div class="prose prose-sm text-slate-600 leading-relaxed mb-4">
                                            {!! $a->description !!}
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Diumumkan pada: {{ $a->created_at->format('d M Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <div
                                        class="p-4 bg-gradient-to-tr from-purple-200 to-indigo-200 rounded-2xl inline-block mb-4">
                                        <svg class="w-12 h-12  text-indigo-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-slate-600 font-medium">Tidak ada pengumuman terbaru</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-3xl blur-xl">
                    </div>
                    <div class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
                                <div class="p-2 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <span class="bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">Aksi
                                    Cepat</span>
                            </h2>
                            <div class="space-y-3">
                                <a class="btn bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white border-0 btn-block gap-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]"
                                    href="{{ route('user.pegawai') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Kelola Pegawai
                                </a>

                                <a href="{{ route('pesan.pegawai') }}"
                                    class="btn bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white border-0 btn-block gap-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                        <path d="M8,12H16V14H8V12M8,16H13V18H8V16Z" />
                                    </svg>
                                    Log Pesan Pegawai
                                </a>

                                <a href="{{ route('setting.user') }}"
                                    class="btn bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white border-0 btn-block gap-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.22,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.22,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.68 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
                                    </svg>
                                    Pengaturan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-3xl blur-xl">
                    </div>
                    <div class="relative bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
                                <div class="p-2 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span
                                    class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Status
                                    Sistem</span>
                            </h2>

                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl border border-slate-200/50 hover:shadow-md transition-all duration-300">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-3 h-3 rounded-full animate-pulse shadow-lg
                @if ($user->status === 'active') bg-green-500 shadow-green-500/50
                @else
                    bg-red-500 shadow-red-500/50 @endif
            ">
                                        </div>
                                        <span class="font-semibold text-slate-700">Service</span>
                                    </div>

                                    <div
                                        class="badge border-0 font-bold shadow-lg
            @if ($user->status === 'active') bg-gradient-to-r from-green-500 to-green-600 text-white
            @else
                bg-gradient-to-r from-red-500 to-red-600 text-white @endif
        ">
                                        {{ $user->status === 'active' ? 'Online' : 'Offline' }}
                                    </div>
                                </div>
                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl border border-slate-200/50 hover:shadow-md transition-all duration-300">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-lg shadow-green-500/50">
                                        </div>
                                        <span class="font-semibold text-slate-700">Database</span>
                                    </div>
                                    <div
                                        class="badge bg-gradient-to-r from-green-500 to-green-600 text-white border-0 font-bold shadow-lg">
                                        Online</div>
                                </div>

                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl border border-slate-200/50 hover:shadow-md transition-all duration-300">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-3 h-3 rounded-full animate-pulse shadow-lg
                @if (($fonnteInfo['status'] ?? 'Invalid') === 'Invalid') bg-red-500 shadow-red-500/50
                @else
                    bg-green-500 shadow-green-500/50 @endif
            ">
                                        </div>
                                        <span class="font-semibold text-slate-700">Fonnte</span>
                                    </div>

                                    <div
                                        class="badge border-0 font-bold shadow-lg
            @if (($fonnteInfo['status'] ?? 'Invalid') === 'Invalid') bg-gradient-to-r from-red-500 to-red-600 text-white
            @else
                bg-gradient-to-r from-green-500 to-green-600 text-white @endif
        ">
                                        {{ $fonnteInfo['status'] ?? 'Invalid' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast toast-top toast-end z-50" id="toastContainer"></div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #6366f1, #8b5cf6);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #4f46e5, #7c3aed);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(99, 102, 241, 0.5);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .glow-animation {
            animation: glow 3s ease-in-out infinite;
        }
    </style>

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
        });
    </script>
@endsection
