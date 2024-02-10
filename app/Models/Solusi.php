<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan model
     *
     * @var string
     */
    protected $table = 'solusi';

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
        'solusi',
    ];
}
