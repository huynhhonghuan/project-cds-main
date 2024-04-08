<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BinhLuanBaiVietResource extends JsonResource
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
            'noiDung' => $this->noidung,
            'phanHois' => BinhLuanBaiVietResource::collection($this->getPhanHois->sortByDesc('created_at')),
            'createdAt' => $this->created_at
        ];
    }
}
