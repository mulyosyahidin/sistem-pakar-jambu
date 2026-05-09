<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gejala extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan model
     *
     * @var string
     */
    protected $table = 'gejala';

    /**
     * Tabel tidak memiliki kolom waktu (created_at dan updated_at)
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Kolom tabel
     *
     * @var array
     */
    protected $fillable = [
        'id_kategori',
        'kode',
        'nama',
        'bobot',
        'deskripsi',
        'media_type',
        'media_url',
    ];

    protected $casts = [
        'bobot' => 'float',
    ];

    /**
     * Relasi many-to-many dengan tabel hama
     */
    public function hama(): BelongsToMany
    {
        return $this->belongsToMany(Hama::class, 'basis_pengetahuan', 'id_gejala', 'id_hama');
    }

    /**
     * Relasi many-to-one dengan tabel kategori_gejala
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori_gejala::class, 'id_kategori');
    }
}
