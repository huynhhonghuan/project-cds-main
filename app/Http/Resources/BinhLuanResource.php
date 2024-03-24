<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BinhLuanResource extends JsonResource
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
            'noiDung' => $this->noidung,
            'hoTen' => $this->getUser?->name ?? "Khách",
            'avatar' => $this->getUser?->image ? env('APP_IMAGE_URL') . 'assets/backend/img/hoso/' . $this->getUser?->image . '?' . rand(0, 99999) : "",
            'phanHois' => BinhLuanResource::collection($this->getPhanHois->sortByDesc('ngaydang')),
            'createdAt' => $this->created_at,
        ];
    }
}
