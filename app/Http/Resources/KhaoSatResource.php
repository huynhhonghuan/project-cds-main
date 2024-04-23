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
            'id' => $this?->id,
            'mucDo' => $this->whenLoaded('getMucDo', new MucDoResource($this->getMucDo)),
            'moHinh' => $this->whenLoaded('getMoHinh', new MoHinhResource($this->getMoHinh)),
            'chuyenGia' => $this->whenLoaded('getChuyenGia', new ChuyenGiaResource($this->getChuyenGia)),
            'chuyenGiaDanhGia' => $this->getChuyenGiaDanhGia?->danhgia,
            'chuyenGiaDeXuat' => $this->getChuyenGiaDanhGia?->dexuat,
            'chuyenGiaDanhGiaAt' => $this->getChuyenGiaDanhGia?->created_at,
            'tongDiem' => $this?->tongdiem,
            'ketQuaTruCots' => KetQuaPhieu1Resource::collection($this->getKetQuaPhieu1),
            'createdAt' => $this?->created_at,
        ];
    }
}
