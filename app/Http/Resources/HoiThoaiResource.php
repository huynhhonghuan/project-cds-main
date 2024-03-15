<?php

namespace App\Http\Resources;

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
            'chuyenGia' => new UserResource($this->getChuyenGiaUser)
        ];
    }
}
