<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\create_image_uri;

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
            'hinhAnh' => create_image_uri('tintuc', $this->hinhanh),
            'tacGia' => $this->getUser->name,
            'linhVuc' => new LinhVucResource($this->getLinhvuc),
            'luotXem' => $this->luotxem,
            'createdAt' => $this->created_at,
        ];
    }
}
