<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\create_image_uri;

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
            'avatar' => create_image_uri('hoso', $this->getUser?->image),
            'phanHois' => BinhLuanResource::collection($this->getPhanHois->sortByDesc('ngaydang')),
            'createdAt' => $this->created_at,
        ];
    }
}
