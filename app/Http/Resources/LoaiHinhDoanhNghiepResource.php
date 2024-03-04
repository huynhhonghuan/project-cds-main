<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\create_image_uri;

class LoaiHinhDoanhNghiepResource extends JsonResource
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
            'tenLoaiHinh' => $this->tenloaihinh,
            'hinhAnh' => create_image_uri('loaihinhdoanhnghiep', $this->hinhanh),
            'moTa' => $this->mota
        ];
    }
}
