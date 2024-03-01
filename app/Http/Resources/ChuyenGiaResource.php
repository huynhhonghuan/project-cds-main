<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function App\Helpers\create;
use function App\Helpers\create_image_uri;

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
            'hinhAnh' => create_image_uri("hoso", $this->getUser->image),
            'email' => $this->getUser->email,
            'sdt' => $this->sdt,
            'diaChi' => $this->diachi . ', ' . $this->xa . ', ' . $this->huyen . ', ' . $this->thanhpho,
            'moTa' => $this->mota,
            'linhVuc' => new LinhVucResource($this->getLinhVuc)
        ];
    }
}
