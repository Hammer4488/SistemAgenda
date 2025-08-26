<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'username',
        'nomor_hp',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Mendapatkan semua jadwal yang DIBUAT oleh user ini.
     * Relasi One-to-Many.
     */
    public function createdSchedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'user_id');
    }

    /**
     * Mendapatkan semua jadwal yang DIIKUTI oleh user ini.
     * Relasi Many-to-Many.
     */
    public function participatingSchedules(): BelongsToMany
    {
        // Nama tabel perantara adalah 'schedule_user'
        return $this->belongsToMany(Schedule::class, 'schedule_user');
    }
}