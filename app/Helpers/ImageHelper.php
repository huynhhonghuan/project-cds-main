<?php

namespace App\Helpers;

if (!function_exists('create_image_uri')) {
    function create_image_uri($imageFolder, $imageName)
    {
        if (empty($imageName))
            return "";
        return asset('assets/backend/img/' . $imageFolder . '/' . $imageName . '?' . rand(0, 99999));
    }
}

if (!function_exists('upload_image')) {
    function upload_image($file, $fileName, $uploadFolder)
    {
        if ($file) {
            $path = 'assets/backend/img/' . $uploadFolder;
            $saveFileName = $fileName . "."  . $file->getClientOriginalExtension();
            $file->move($path, $saveFileName);
            return $saveFileName;
        }
    }
}
