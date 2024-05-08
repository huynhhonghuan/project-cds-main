<?php

namespace App\Http\Services;

use App\Models\ThongBao;
use App\Models\User;

class NotificationService
{
    public function sendNotification($message, $to_user_id)
    {
        $user = User::find($to_user_id);
        // dd($user);
        $noti = new ThongBao();

        $noti->user_id = $user->id;
        $noti->tieude = $message['tieude'];
        $noti->noidung = $message['noidung'];
        $noti->loai = $message['loai'] ?? null;
        $noti->loai_id = $message['loai_id'] ?? null;
        $noti->save();
        if ($user->device_token) {
            $this->sendPushNotification($message, $user->device_token);
        }
    }

    public function sendPushNotification($message, $to)
    {
        $data = [
            "to" => $to,
            "title" => $message['tieude'],
            "body" => $message['noidung'],
            "sound" => "default",
        ];
        $dataString = json_encode($data);

        $headers = [
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://exp.host/--/api/v2/push/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);
    }
}
