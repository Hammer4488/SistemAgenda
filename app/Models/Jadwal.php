<?php

namespace App; // Atau App\Models, tergantung struktur folder Anda

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jadwal extends Model
{
    use HasFactory;
    protected $table= 'jadwal';
    protected $fillable = [
        'judul',
        'deskripsi',
        'waktu_mulai',
        'waktu_akhir',
        'tipe',
        'user_id', // ID pembuat jadwal
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'waktu_mulai' => 'datetime',
            'waktu_akhir' => 'datetime',
        ];
    }

    /**
     * Mendapatkan data user yang MEMBUAT jadwal ini.
     * Relasi one-to-many (inverse).
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Mendapatkan semua user yang menjadi PESERTA jadwal ini.
     * Relasi many-to-many.
     */
    public function participants(): BelongsToMany
    {
        // Nama tabel perantara adalah 'schedule_user' atau 'jadwal_user'
        return $this->belongsToMany(User::class, 'jadwal_user');
    }
}