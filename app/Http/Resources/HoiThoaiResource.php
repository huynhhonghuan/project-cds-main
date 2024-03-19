<?php

namespace App\Http\Resources;

use App\Models\TinNhan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HoiThoaiResource extends JsonResource
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
            'doanhNghiep' => new UserResource($this->getDoanhNghiepUser),
            'chuyenGia' => new UserResource($this->getChuyenGiaUser),
            'tinNhans' => TinNhanResource::collection($this->getTinNhans)
            // 'tinNhans' => $this->whenLoaded('getTinNhans', TinNhanResource::collection($this->getTinNhans))
        ];
    }
}
