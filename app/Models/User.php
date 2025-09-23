<?php

namespace App\Models;

use App\Models\Pesan;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'pesan_pemohon',
        'pesan_penyerahan',
        'pesan_ditolak',
        'pesan_ikm',
        'pesan_pegawai',
        'status',
        'email_verified_at',
        'unit_id',
        'fonnte',
        'api_url',
        'subcription_token',
        'subscription_expires_at',
        'username_mpp',
        'password_mpp',
        'lokasi_mpp',
    ];
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'timestamp',
        'password' => 'hashed',
        'subscription_expires_at' => 'datetime',
    ];
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->subscription_token = Str::random(20);
        });
    }
}
