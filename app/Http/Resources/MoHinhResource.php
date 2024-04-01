<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MoHinhResource extends JsonResource
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
            'tenMoHinh' => $this->tenmohinh,
            'noiDung' => $this->noidung,
            'hinhAnh' => $this->hinhanh ? env('APP_IMAGE_URL') . '/assets/backend/img/mohinh/' . $this->hinhanh . '?' . rand(0, 99999) : "",

        ];
    }
}
