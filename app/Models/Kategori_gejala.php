<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori_gejala extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan model
     *
     * @var string
     */
    protected $table = 'kategori_gejala';

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
        'nama',
    ];

    /**
     * Relasi one-to-many dengan tabel gejala
     *
     * @return HasMany
     */
    public function gejala(): HasMany
    {
        return $this->hasMany(Gejala::class, 'id_kategori');
    }
}
