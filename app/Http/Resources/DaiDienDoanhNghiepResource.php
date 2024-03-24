<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DaiDienDoanhNghiepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tenDaiDien' => $this->tendaidien,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'thanhPho' => $this->thanhpho,
            'huyen' => $this->huyen,
            'xa' => $this->xa,
            'diaChi' => $this->diachi,
            'cccd' => $this->cccd,
            'imgMatTruoc' => $this->img_mattruoc ? env('APP_IMAGE_URL') .  'assets/backend/img/hoso/' . $this->img_mattruoc . '?' . rand(0, 99999) : "",
            'imgMatSau' => $this->img_matsau ? env('APP_IMAGE_URL')  . 'assets/backend/img/hoso/' . $this->img_matsau . '?' . rand(0, 99999) : "",
            'chucVu' => $this->chucvu,
            'moTa' => $this->mota,
        ];
    }
}
