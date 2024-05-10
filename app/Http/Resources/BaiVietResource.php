<?php

namespace App\Http\Resources;

use App\Models\BaiViet_Anh;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaiVietResource extends JsonResource
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
            'user' => new UserResource($this->getUser),
            'luotXem' => $this->luotxem,
            'noiDung' => $this->noidung,
            'hinhAnhs' => BaiViet_AnhResource::collection($this->getHinhAnhs),
            'luotThich' => $this->luotthich,
            'isLike' => $this->liked,
            'doanhNghiep' => new DoanhNghiepResource($this->getUser?->getDoanhNghiep),
            // 'danhMucs' => DanhMucResource::collection($this->getDanhMucs),
            'createdAt' => $this->created_at
        ];
    }
}
