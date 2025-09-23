<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CustomPesanController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
Route::post('/signup', [HomeController::class, 'storeSignup'])->name('signup.store');
Route::get('/signup/otp', [HomeController::class, 'showOtp'])->name('signup.otp');
Route::post('/signup/verify', [HomeController::class, 'verifyOtp'])->name('signup.verify');
Route::get('/signup/otp/resend', [HomeController::class, 'resendOtp'])->name('signup.otp.resend');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/docs/{page?}', [DocsController::class, 'show'])->name('docs')->where('page', '.*');

Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.user');

Route::middleware('auth:user')->group(function () {
    Route::match(['get', 'post'], '/user/pesan/pemohon', [CustomPesanController::class, 'pesanPemohon'])->name('custom.pesan.pemohon');
    Route::match(['get', 'post'], '/user/pesan/sk-diterbitkan', [CustomPesanController::class, 'pesanPenyerahan'])->name('custom.pesan.penyerahan');
    Route::match(['get', 'post'], '/user/pesan/pegawai', [CustomPesanController::class, 'pesanPegawai'])->name('custom.pesan.pegawai');
    Route::match(['get', 'post'], '/user/pesan/ditolak', [CustomPesanController::class, 'pesanDitolak'])->name('custom.pesan.ditolak');
    Route::match(['get', 'post'], '/user/pesan/survey-ikm', [CustomPesanController::class, 'pesanIkm'])->name('custom.pesan.ikm');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout.user');
    Route::get('/user/dashboard', [UserAuthController::class, 'index'])->name('dashboard.user');
    Route::get('/user/profile', [UserAuthController::class, 'profile'])->name('profile.user');
    Route::post('/user/profile/update', [UserAuthController::class, 'profileStore'])->name('profile.update');
    Route::get('/user/settings', [UserAuthController::class, 'settings'])->name('setting.user');
    Route::post('/user/setting/update', [UserAuthController::class, 'updateUserConfig'])->name('setting.update');
    Route::get('/user/pegawai', [UserAuthController::class, 'pegawai'])->name('user.pegawai');
    Route::post('/user/pegawai', [UserAuthController::class, 'store'])->name('pegawai.store');
    Route::delete('/user/pegawai/{id}', [UserAuthController::class, 'destroy'])->name('pegawai.destroy');
    Route::put('/user/pegawai/update', [UserAuthController::class, 'update'])->name('pegawai.update');
    Route::get('/user/pesan', [UserAuthController::class, 'pesan'])->name('pesan.user');
    Route::get('/user/pesan', [UserAuthController::class, 'pesan'])->name('pesan.user');
    Route::get('/pesan/pegawai', [UserAuthController::class, 'pesanPegawai'])->name('pesan.pegawai');
    Route::get('/user/billing', [BillingController::class, 'index'])->name('user.billing');
    Route::post('/user/billing/pay', [BillingController::class, 'pay'])->name('billing.pay');
    Route::get('/user/billing/status/{payToken}', [BillingController::class, 'paketStatus'])->name('billing.status');
    Route::get('/user/billing/success', [BillingController::class, 'paymentSuccess'])->name('billing.success');
});
