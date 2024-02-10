<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    public $fillable = [
        'file_name',
        'file_path',
        'file_mime_type',
        'file_size',
    ];

    /**
     * Mendapatkan URL lengkap dari file
     * 
     * @return string
     */
    public function getFullUrl()
    {
        return asset($this->file_path);
    }

    /**
     * Mendapatkan path lengkap dari file
     * 
     * @return string
     */
    public function getFullPath()
    {
        return public_path($this->file_path);
    }
}
