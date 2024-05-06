<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThongBaoResource extends JsonResource
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
            'tieuDe' => $this->tieude,
            'noiDung' => $this->noidung,
            'daXem' => $this->daxem,
            'loai' => $this->loai,
            'loaiId' => $this->loai_id,
            'user' => new UserResource($this->getUser),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
