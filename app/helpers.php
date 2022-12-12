<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_base64_image')) {
    function upload_base64_image($base64_image, $path)
    {
        $extension = explode('/', explode(':', substr($base64_image, 0, strpos($base64_image, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($base64_image, 0, strpos($base64_image, ',') + 1);
        $image = str_replace($replace, '', $base64_image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put($path . $extension, base64_decode($image));
        return $path . $extension;
    }
}
