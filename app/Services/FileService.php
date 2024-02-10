<?php

namespace App\Services;

class FileService
{
    /**
     * Upload file
     *
     * @param $fieldName
     * @return array|false
     */
    public static function upload($fieldName = null): false|array
    {
        if ($fieldName != null) {
            if (request()->has($fieldName) && request()->file($fieldName)->isValid()) {
                $file = request()->file($fieldName);

                $year = date('Y');
                $month = date('m');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $path = "{$year}/{$month}";
                $file->storeAs($path, $fileName, 'uploads');

                return [
                    'file_name' => $fileName,
                    'file_path' => 'uploads/' . $path . '/' . $fileName,
                    'file_size' => $file->getSize(),
                    'file_mime_type' => $file->getMimeType(),
                ];
            }
        }

        return false;
    }

    /**
     * Delete file
     *
     * @param $filePath
     * @return bool
     */
    public static function delete($filePath): bool
    {
        if (file_exists($filePath)) {
            unlink($filePath);

            return true;
        }

        return false;
    }
}
