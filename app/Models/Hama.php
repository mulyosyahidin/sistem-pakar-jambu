<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hama extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan model
     *
     * @var string
     */
    protected $table = 'hama';

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
        'kode',
        'nama',
        'deskripsi',
        'foto',
    ];

    /**
     * Relasi many-to-many ke model Solusi
     *
     * @return BelongsToMany
     */
    public function solusi(): BelongsToMany
    {
        return $this->belongsToMany(Solusi::class, 'solusi_hama', 'id_hama', 'id_solusi');
    }

    /**
     * Relasi basis pengetahuan
     *
     * Relasi basis pengetahuan merupakan relasi many-to-many antara model Hama dan model Gejala.
     * Relasi ini menggunakan tabel basis pengetahuan (tb_basis_pengetahuan) sebagai pivot table.
     *
     * @return BelongsToMany
     */
    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuan', 'id_hama', 'id_gejala');
    }
}
