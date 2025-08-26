<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembuatan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Wajib didefinisikan karena 'Pembuatan' tidak mengikuti konvensi Laravel.
     *
     * @var string
     */
    protected $table = 'Pembuatan';

    /**
     * Primary key untuk model ini.hhhh
     * Wajib didefinisikan karena nama PK bukan 'id'.
     *
     * @var string
     */
    protected $primaryKey = 'id_Pembuatan';

    /**
     * Kolom yang boleh diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jadwal_id',
        'user_id',
    ];

    /**
     * Mendapatkan data jadwal yang terhubung dengan entri partisipasi ini.
     */
    public function jadwal(): BelongsTo
    {
        // Terhubung ke model 'Jadwal' melalui foreign key 'jadwal_id'
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    /**
     * Mendapatkan data user yang terhubung dengan entri partisipasi ini.
     */
    public function user(): BelongsTo
    {
        // Terhubung ke model 'User' melalui foreign key 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}