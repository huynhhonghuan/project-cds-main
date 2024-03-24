<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoaiHinhDoanhNghiepResource extends JsonResource
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
            'tenLoaiHinh' => $this->tenloaihinh,
            'hinhAnh' => $this->hinhanh ? env('APP_IMAGE_URL') . 'assets/backend/img/loaihinhdoanhnghiep/' . $this->hinhanh . '?' . rand(0, 99999) : "",
            'moTa' => $this->mota
        ];
    }
}
