<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThuVienResource extends JsonResource
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
            'kyHieu' => $this->kyhieu,
            'namPhatHanh' => $this->namphathanh,
            'loai' => $this->loai,
            'url' => $this->file ? env('APP_IMAGE_URL') . '/assets/frontend/file' . '/' . $this->file . '?' . rand(0, 99999) : "",
            'file' => $this->file,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
