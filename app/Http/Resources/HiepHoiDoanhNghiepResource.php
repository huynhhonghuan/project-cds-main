<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HiepHoiDoanhNghiepResource extends JsonResource
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
            'tenTiengViet' => $this->tentiengviet,
            'tenTiengAnh' => $this->tentienganh,
            'sdt' => $this->sdt,
            'diaChi' => $this->diachi,
            'moTa' => $this->mota,
            'hinhAnh' => $this->getUser ? env('APP_IMAGE_URL') .  '/assets/backend/img/hoso/' . $this->getUser->image . '?' . rand(0, 99999) : "",
            'daiDien' => new DaiDienHiepHoiResource($this->getDaiDien)
        ];
    }
}
