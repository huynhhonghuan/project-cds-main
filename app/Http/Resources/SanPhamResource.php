<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SanPhamResource extends JsonResource
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
            'tenSanPham' => $this->tensanpham,
            'gia' => $this->gia,
            'moTa' => $this->mota,
            'doanhNghiep' => new DoanhNghiepResource($this->getDoanhNghiep),
            'hinhAnhs' => SanPhamAnhResource::collection($this->getHinhAnhs),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
