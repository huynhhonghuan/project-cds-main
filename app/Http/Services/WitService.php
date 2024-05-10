<?php

namespace App\Http\Services;

use App\Models\ThongBao;
use App\Models\User;

class WitService
{
    public function getIntentByMessage($message)
    {
        $witVersion = 20240508;

        $url = 'https://api.wit.ai/message?v=' . $witVersion . '&q=' . urlencode($message);

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . env('WIT_AI_API_KEY'),
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $reqsonse = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($reqsonse);
        $intents = $response->intents;
        if (count($intents) != 0) {
            return $intents[0]->name;
        }
        return "";
    }
}
