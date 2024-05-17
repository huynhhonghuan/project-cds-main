<?php

namespace App\Http\Services;

class ImageService
{
    public function saveImageToHost($path, $filePath)
    {
        $client = new \GuzzleHttp\Client();
        $url = env('APP_IMAGE_URL') . '/api/store-image';
        $response = $client->request('POST', $url, [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($filePath, 'r'),
                ],
                [
                    'name'     => 'path',
                    'contents' => $path,
                ]
            ],
            'Content-Type' => 'multipart/form-data'
        ]);
        return $response->getBody()->getContents();
    }
}
