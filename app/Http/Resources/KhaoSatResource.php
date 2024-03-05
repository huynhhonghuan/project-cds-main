<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KhaoSatResource extends JsonResource
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
            'mucDo' => new MucDoResource($this->getChienLuoc?->getMucDo),
            'moHinh' => new MoHinhResource($this->getChienLuoc?->getMoHinh),
            'chuyenGia' => new ChuyenGiaResource($this->getChuyenGiaDanhGia?->getChuyenGia),
            'chuyenGiaDanhGia' => $this->getChuyenGiaDanhGia?->danhgia,
            'chuyenGiaDeXuat' => $this->getChuyenGiaDanhGia?->dexuat,
            'chuyenGiaDanhGiaAt' => $this->getChuyenGiaDanhGia?->created_at
        ];
    }
}
