<?php

namespace App\Helpers;

if (!function_exists('create_image_uri')) {
    function create_image_uri($imageFolder, $imageName)
    {
        if (empty($imageName))
            return "";
        return asset('assets/backend/img/' . $imageFolder . '/' . $imageName);
    }
}
