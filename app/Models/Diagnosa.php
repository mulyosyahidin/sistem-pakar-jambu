<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diagnosa extends Model
{
    use HasFactory;

    /**
     * Tabel yang digunakan model
     *
     * @var string
     */
    protected $table = 'diagnosa';

    /**
     * Kolom tabel
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'id_hama',
        'persentase',
    ];

    /**
     * Relasi many-to-many ke model Gejala
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(Gejala::class, 'gejala_diagnosa', 'id_diagnosa', 'id_gejala');
    }

    /**
     * User yang memiliki diagnosa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hama yang dihasilkan dari diagnosa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hama(): BelongsTo
    {
        return $this->belongsTo(Hama::class, 'id_hama');
    }
}
