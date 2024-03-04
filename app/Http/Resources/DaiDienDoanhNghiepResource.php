<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\create_image_uri;

class DaiDienDoanhNghiepResource extends JsonResource
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
            'tenDaiDien' => $this->tendaidien,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'thanhPho' => $this->thanhpho,
            'huyen' => $this->huyen,
            'xa' => $this->xa,
            'diaChi' => $this->diachi,
            'cccd' => $this->cccd,
            'imgMatTruoc' => create_image_uri('hoso', $this->img_mattruoc),
            'imgMatSau' => create_image_uri('hoso', $this->img_matsau),
            'chucVu' => $this->chucvu,
            'moTa' => $this->mota,
        ];
    }
}
