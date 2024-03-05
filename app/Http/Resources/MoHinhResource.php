<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\create_image_uri;

class MoHinhResource extends JsonResource
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
            'tenMoHinh' => $this->tenmohinh,
            'noiDung' => $this->noidung,
            'hinhAnh' => create_image_uri('mohinh', $this->hinhanh),

        ];
    }
}
