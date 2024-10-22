<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChuyenGiaResource extends JsonResource
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
            'tenChuyenGia' => $this->tenchuyengia,
            'hinhAnh' => $this->getUser?->image ? env('APP_IMAGE_URL') . '/assets/backend/img/hoso/' . $this->getUser->image . '?' . rand(0, 99999) : "",
            'email' => $this->getUser->email,
            'sdt' => $this->sdt,
            'diaChi' => $this->diachi,
            'moTa' => $this->mota,
            'chucVu' => $this->chucvu,
            'namKinhNghiem' => $this->namkinhnghiem,
            'trinhDo' => $this->trinhdo,
            'linhVuc' => new LinhVucResource($this->getLinhVuc),
            'user' => new UserResource($this->getUser),
        ];
    }
}
