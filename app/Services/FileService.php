<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * Upload file
     */
    public static function upload($fieldName = null): false|array
    {
        if ($fieldName != null) {
            if (request()->has($fieldName) && request()->file($fieldName)->isValid()) {
                $file = request()->file($fieldName);

                $year = date('Y');
                $month = date('m');

                $fileName = time().'_'.$file->getClientOriginalName();

                $path = "{$year}/{$month}";
                
                $file->storeAs($path, $fileName, 'public');

                return [
                    'file_name' => $fileName,
                    'file_path' => 'storage/'.$path.'/'.$fileName,
                    'file_size' => $file->getSize(),
                    'file_mime_type' => $file->getMimeType(),
                ];
            }
        }

        return false;
    }

    /**
     * Delete file
     */
    public static function delete($filePath): bool
    {
        // $filePath biasanya 'storage/2026/05/file.jpg'
        // Kita perlu hapus 'storage/' prefix jika ingin menggunakan Storage::disk('public')
        $relativePath = str_replace('storage/', '', $filePath);

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);

            return true;
        }

        return false;
    }
}
