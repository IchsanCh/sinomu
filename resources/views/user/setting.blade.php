@extends('user.layout2')

@section('title', 'Settings')
@section('meta_description',
    'Atur preferensi sistem seperti base URL, token Fonnte, Username mpp, password mpp dan
    lokasi mpp.')

@section('og_description',
    'Halaman pengaturan SINOMU. Kelola konfigurasi sistem untuk memastikan pengiriman notifikasi
    WhatsApp berjalan sesuai kebutuhan.')
@section('content')
    <div class="min-h-screen bg-base-200">
        <div class="wadb1 borderbc1">
            <div class="px-6 py-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg wadbo3 flex items-center justify-center">
                        <svg class="w-5 h-5 wad4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold wad4">Settings</h1>
                        <p class="text-white">Personalisasi akun dan pengaturan aplikasi</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-8">
            <div class="card bg-base-100 shadow-sm borderprimary">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-5 h-5 wad1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                            </path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-semibold wad1">Konfigurasi SINOMU</h2>
                            <p class="text-sm text-black">Sesuaikan pengaturan sistem pada aplikasi SINOMU</p>
                        </div>
                    </div>
                    <form action="{{ route('setting.update') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="form-control mb-4">
                            <label class="cursor-pointer label">
                                <span class="label-text font-medium text-black">Service Status</span>
                                <input type="checkbox" name="active" class="toggle toggle-primary"
                                    {{ $user->status === 'active' ? 'checked' : '' }}>
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label mb-1" for="apirul">
                                <span class="label-text font-medium text-black">BASE URL</span>
                            </label>
                            <input type="url" id="apirul" name="apirul" readonly class="input borderprimary w-full"
                                placeholder="Ex: https://lotusaja.com/api/pemohon" value="{{ $user->api_url }}" required>
                            <div class="">
                                <span class="text-black">Only super admin can edit it.</span>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label mb-1" for="username_mpp">
                                <span class="label-text font-medium text-black">Username MPP</span>
                                <span class="badge wadb1 text-white badge-sm">Required</span>
                            </label>
                            <input type="text" id="username_mpp" name="username_mpp" class="input borderprimary w-full"
                                placeholder="Ex: Ichsan" value="{{ $user->username_mpp }}" required>
                            <div class="">
                                <span class="text-black">Enter valid user for login mpp digital</span>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label mb-1" for="password_mpp">
                                <span class="label-text font-medium text-black">Password MPP</span>
                                <span class="badge wadb1 text-white badge-sm">Required</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="password_mpp" name="password_mpp"
                                    class="input borderprimary w-full pr-10" placeholder="Enter your MPP Password"
                                    value="{{ $user->password_mpp }}" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword('password_mpp')">
                                    <svg id="password_mpp-eye" class="w-4 h-4 text-black" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="">
                                <span class="text-black">Enter valid password for login mpp digital</span>
                            </div>
                        </div>
                        <div class="form-control flex flex-col">
                            <label class="label mb-1" for="lokasi_mpp">
                                <span class="label-text font-medium text-black">Lokasi MPP</span>
                                <span class="badge wadb1 text-white badge-sm">Required</span>
                            </label>
                            <div class="dropdown" id="dropdown-container">
                                <div class="relative">
                                    <input type="text" id="search-input" class="input borderprimary w-full pr-10"
                                        placeholder="Cari dan pilih wilayah..." autocomplete="off">
                                    <button type="button"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"
                                        id="dropdown-arrow">
                                        <svg class="w-5 h-5 text-black/70 transition-transform duration-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="dropdown-contents menu bg-base-100 rounded-box w-full shadow-lg borderprimary max-h-80 overflow-y-auto hidden"
                                    id="dropdown-menu">
                                    <div id="no-results" class="px-4 py-6 text-center text-black hidden">
                                        <div class="flex flex-col items-center gap-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                            <span>Tidak ada hasil ditemukan</span>
                                        </div>
                                    </div>
                                    <div id="options-container"></div>
                                </div>
                            </div>
                            <input type="hidden" id="lokasi_mpp" name="lokasi_mpp" required>
                            <div class="">
                                <span class="text-black">Enter valid location for login mpp digital</span>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label mb-1" for="fonnte">
                                <span class="label-text font-medium text-black">Token Fonnte</span>
                                <span class="badge wadb1 text-white badge-sm">Required</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="fonnte" name="fonnte"
                                    class="input borderprimary w-full pr-10" placeholder="Enter your Fonnte token"
                                    value="{{ $user->fonnte }}" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword('fonnte')">
                                    <svg id="fonnte-eye" class="w-4 h-4 text-black" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="">
                                <span class="text-black">Status:
                                    {{ $fonnteInfo['status'] ?? 'Connect The Fonnte Device or Check The Token!' }}</span>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label mb-1" for="sitoken">
                                <span class="label-text font-medium text-black">SINOMU Token</span>
                            </label>
                            @php
                                use Carbon\Carbon;
                                $expired = Carbon::now()->gt($user->subscription_expires_at);
                                $message = urlencode(
                                    "Halo, saya {$user->name}. Saya ingin memperbarui langganan dengan token berikut: {$user->subscription_token}. Mohon bantuannya. Terima kasih.",
                                );
                            @endphp
                            <div class="relative">
                                <input type="password" id="sitoken" name="sitoken" readonly
                                    class="input borderprimary w-full pr-10" placeholder="Enter your SINOMU Token"
                                    value="{{ $user->subscription_token }}" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword('sitoken')">
                                    <svg id="sitoken-eye" class="w-4 h-4 text-black" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <label class="label">
                                <span class="label-text-alt text-black">
                                    Valid Until
                                    {{ $user->subscription_expires_at->format('d M Y H:i:s') }}
                                    WIB
                                </span>
                            </label>

                            @if ($expired)
                                <a href="{{ route('user.billing') }}">
                                    <div class="perbarui mt-2">
                                        <div role="alert" class="alert alert-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span>Expired SINOMU Token! Click here to renew your subscription</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            <div class="pt-4">
                                <button type="submit" class="btn btnprimarys w-full sm:w-auto">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Save Configuration
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(fieldId + '-eye');

            if (field.type === 'password') {
                field.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                field.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
        class SearchableSelect {
            constructor() {
                this.searchInput = document.getElementById('search-input');
                this.dropdownMenu = document.getElementById('dropdown-menu');
                this.optionsContainer = document.getElementById('options-container');
                this.hiddenInput = document.getElementById('lokasi_mpp');
                this.noResults = document.getElementById('no-results');
                this.dropdownArrow = document.getElementById('dropdown-arrow');

                this.isOpen = false;
                this.selectedValue = '';
                this.selectedText = '';
                this.storageKey = 'lokasi_mpp_session';

                this.options = [
                    // ACEH
                    {
                        value: "1102",
                        text: "ACEH TENGGARA",
                        group: "ACEH"
                    },
                    {
                        value: "1106",
                        text: "ACEH BESAR",
                        group: "ACEH"
                    },
                    {
                        value: "1107",
                        text: "PIDIE",
                        group: "ACEH"
                    },
                    {
                        value: "1108",
                        text: "ACEH UTARA",
                        group: "ACEH"
                    },
                    {
                        value: "1112",
                        text: "ACEH BARAT DAYA",
                        group: "ACEH"
                    },
                    {
                        value: "1171",
                        text: "KOTA BANDA ACEH",
                        group: "ACEH"
                    },
                    {
                        value: "1172",
                        text: "KOTA SABANG",
                        group: "ACEH"
                    },

                    // BALI
                    {
                        value: "5101",
                        text: "JEMBRANA",
                        group: "BALI"
                    },
                    {
                        value: "5103",
                        text: "BADUNG",
                        group: "BALI"
                    },
                    {
                        value: "5104",
                        text: "GIANYAR",
                        group: "BALI"
                    },
                    {
                        value: "5106",
                        text: "BANGLI",
                        group: "BALI"
                    },
                    {
                        value: "5107",
                        text: "KARANGASEM",
                        group: "BALI"
                    },

                    // BANTEN
                    {
                        value: "3601",
                        text: "PANDEGLANG",
                        group: "BANTEN"
                    },
                    {
                        value: "3602",
                        text: "LEBAK",
                        group: "BANTEN"
                    },
                    {
                        value: "3671",
                        text: "KOTA TANGERANG",
                        group: "BANTEN"
                    },

                    // BENGKULU
                    {
                        value: "1701",
                        text: "BENGKULU SELATAN",
                        group: "BENGKULU"
                    },
                    {
                        value: "1703",
                        text: "BENGKULU UTARA",
                        group: "BENGKULU"
                    },
                    {
                        value: "1705",
                        text: "SELUMA",
                        group: "BENGKULU"
                    },
                    {
                        value: "1771",
                        text: "KOTA BENGKULU",
                        group: "BENGKULU"
                    },

                    // YOGYAKARTA
                    {
                        value: "3402",
                        text: "BANTUL",
                        group: "DAERAH ISTIMEWA YOGYAKARTA"
                    },
                    {
                        value: "3403",
                        text: "GUNUNGKIDUL",
                        group: "DAERAH ISTIMEWA YOGYAKARTA"
                    },
                    {
                        value: "3404",
                        text: "SLEMAN",
                        group: "DAERAH ISTIMEWA YOGYAKARTA"
                    },
                    {
                        value: "3471",
                        text: "KOTA YOGYAKARTA",
                        group: "DAERAH ISTIMEWA YOGYAKARTA"
                    },

                    // GORONTALO
                    {
                        value: "7501",
                        text: "GORONTALO",
                        group: "GORONTALO"
                    },

                    // JAMBI
                    {
                        value: "1503",
                        text: "SAROLANGUN",
                        group: "JAMBI"
                    },
                    {
                        value: "1505",
                        text: "MUARO JAMBI",
                        group: "JAMBI"
                    },
                    {
                        value: "1506",
                        text: "TANJUNG JABUNG BARAT",
                        group: "JAMBI"
                    },
                    {
                        value: "1507",
                        text: "TANJUNG JABUNG TIMUR",
                        group: "JAMBI"
                    },
                    {
                        value: "1509",
                        text: "TEBO",
                        group: "JAMBI"
                    },
                    {
                        value: "1571",
                        text: "KOTA JAMBI",
                        group: "JAMBI"
                    },
                    {
                        value: "1572",
                        text: "KOTA SUNGAI PENUH",
                        group: "JAMBI"
                    },

                    // JAWA BARAT
                    {
                        value: "3203",
                        text: "CIANJUR",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3204",
                        text: "BANDUNG",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3209",
                        text: "CIREBON",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3210",
                        text: "MAJALENGKA",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3211",
                        text: "SUMEDANG",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3214",
                        text: "PURWAKARTA",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3218",
                        text: "PANGANDARAN",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3272",
                        text: "KOTA SUKABUMI",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3273",
                        text: "KOTA BANDUNG",
                        group: "JAWA BARAT"
                    },
                    {
                        value: "3279",
                        text: "KOTA BANJAR",
                        group: "JAWA BARAT"
                    },

                    // JAWA TENGAH
                    {
                        value: "3302",
                        text: "BANYUMAS",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3303",
                        text: "PURBALINGGA",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3304",
                        text: "BANJARNEGARA",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3305",
                        text: "KEBUMEN",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3306",
                        text: "PURWOREJO",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3309",
                        text: "BOYOLALI",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3312",
                        text: "WONOGIRI",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3314",
                        text: "SRAGEN",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3315",
                        text: "GROBOGAN",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3316",
                        text: "BLORA",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3319",
                        text: "KUDUS",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3321",
                        text: "DEMAK",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3322",
                        text: "SEMARANG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3323",
                        text: "TEMANGGUNG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3325",
                        text: "BATANG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3326",
                        text: "PEKALONGAN",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3327",
                        text: "PEMALANG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3328",
                        text: "TEGAL",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3329",
                        text: "BREBES",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3371",
                        text: "KOTA MAGELANG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3372",
                        text: "KOTA SURAKARTA",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3373",
                        text: "KOTA SALATIGA",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3374",
                        text: "KOTA SEMARANG",
                        group: "JAWA TENGAH"
                    },
                    {
                        value: "3376",
                        text: "KOTA TEGAL",
                        group: "JAWA TENGAH"
                    },

                    // JAWA TIMUR (continuing with key cities)
                    {
                        value: "3501",
                        text: "PACITAN",
                        group: "JAWA TIMUR"
                    },
                    {
                        value: "3507",
                        text: "MALANG",
                        group: "JAWA TIMUR"
                    },
                    {
                        value: "3578",
                        text: "KOTA SURABAYA",
                        group: "JAWA TIMUR"
                    },
                    {
                        value: "3579",
                        text: "KOTA BATU",
                        group: "JAWA TIMUR"
                    },
                    {
                        value: "1",
                        text: "Test 1",
                        group: "Only Test"
                    },
                    {
                        value: "2",
                        text: "Test 2",
                        group: "Only Test"
                    }
                ];

                this.filteredOptions = [...this.options];
                this.init();
            }

            init() {
                this.renderOptions();
                this.bindEvents();
                this.loadSavedValue();
            }

            bindEvents() {
                this.searchInput.addEventListener('focus', () => this.open());
                this.searchInput.addEventListener('input', (e) => this.handleSearch(e.target.value));
                this.searchInput.addEventListener('keydown', (e) => this.handleKeydown(e));
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('#dropdown-container')) {
                        this.close();
                    }
                });
                this.dropdownMenu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            }

            handleSearch(query) {
                const searchTerm = query.toLowerCase().trim();

                if (searchTerm === '') {
                    this.filteredOptions = [...this.options];
                } else {
                    this.filteredOptions = this.options.filter(option =>
                        option.text.toLowerCase().includes(searchTerm) ||
                        option.group.toLowerCase().includes(searchTerm)
                    );
                }

                this.renderOptions();
                this.open();
            }

            renderOptions() {
                this.optionsContainer.innerHTML = '';

                if (this.filteredOptions.length === 0) {
                    this.noResults.classList.remove('hidden');
                    return;
                }

                this.noResults.classList.add('hidden');

                const groupedOptions = this.filteredOptions.reduce((groups, option) => {
                    if (!groups[option.group]) {
                        groups[option.group] = [];
                    }
                    groups[option.group].push(option);
                    return groups;
                }, {});

                Object.keys(groupedOptions).sort().forEach(group => {
                    const groupHeader = document.createElement('li');
                    groupHeader.className =
                        'px-4 py-2 text-xs font-bold wad1 uppercase bg-base-100';
                    groupHeader.textContent = group;
                    this.optionsContainer.appendChild(groupHeader);
                    groupedOptions[group].forEach(option => {
                        const optionElement = document.createElement('li');
                        const isSelected = this.selectedValue === option.value;
                        optionElement.innerHTML = `
                           <a href="#"
                            class="px-4 py-3 block mb-1 colorsan transition-colors duration-150 ${isSelected ? 'wadb3 wad4 font-medium' : ''}"
                            data-value="${option.value}"
                            data-text="${option.text}">
                            <span class="flex-1">${option.text}</span>
                            ${isSelected ? '<svg class="w-4 h-4 wad4 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' : ''}
                        </a>
                        `;
                        const link = optionElement.querySelector('a');
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            this.selectOption(option.value, option.text);
                        });
                        optionElement.addEventListener('click', () => {
                            this.selectOption(option.value, option.text);
                        });

                        this.optionsContainer.appendChild(optionElement);
                    });
                });
            }

            selectOption(value, text) {
                this.selectedValue = value;
                this.selectedText = text;
                this.searchInput.value = text;
                this.hiddenInput.value = value;
                sessionStorage.setItem(this.storageKey, value);
                this.renderOptions();
                this.close();
                this.hiddenInput.dispatchEvent(new Event('change'));
            }

            handleKeydown(e) {
                if (e.key === 'Escape') {
                    this.close();
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    this.open();
                    this.focusFirstOption();
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (this.filteredOptions.length === 1) {
                        const option = this.filteredOptions[0];
                        this.selectOption(option.value, option.text);
                    }
                }
            }

            focusFirstOption() {
                const firstOption = this.optionsContainer.querySelector('a[data-value]');
                if (firstOption) {
                    firstOption.focus();
                }
            }

            open() {
                if (!this.isOpen) {
                    this.isOpen = true;
                    this.dropdownMenu.classList.remove('hidden');
                    this.dropdownArrow.querySelector('svg').style.transform = 'rotate(180deg)';
                }
            }

            close() {
                if (this.isOpen) {
                    this.isOpen = false;
                    this.dropdownMenu.classList.add('hidden');
                    this.dropdownArrow.querySelector('svg').style.transform = 'rotate(0deg)';
                    if (!this.selectedValue && this.searchInput.value) {
                        this.searchInput.value = '';
                    } else if (this.selectedValue) {
                        this.searchInput.value = this.selectedText;
                    }
                }
            }
            loadSavedValue() {
                const dbValue = @json($user->lokasi_mpp ?? '');

                let savedValue = dbValue;
                if (savedValue) {
                    const option = this.options.find(opt => opt.value === savedValue);
                    if (option) {
                        this.selectOption(option.value, option.text);
                    }
                }
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            new SearchableSelect();
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
