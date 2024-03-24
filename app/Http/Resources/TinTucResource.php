<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TinTucResource extends JsonResource
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
            'tomTat' => $this->tomtat,
            'hinhAnh' => $this->hinhanh ? env('APP_IMAGE_URL') . 'assets/fronend/img/trangtin/' . $this->hinhanh . '?' . rand(0, 99999) : "",
            'tacGia' => $this->getUser->name,
            'linhVuc' => new LinhVucResource($this->getLinhvuc),
            'luotXem' => $this->luotxem,
            'nguon' => $this->nguon,
            'createdAt' => $this->created_at,
        ];
    }
}
