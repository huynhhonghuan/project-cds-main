<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaiViet_AnhResource extends JsonResource
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
            'hinhAnh' => $this->hinhanh ? env('APP_IMAGE_URL') . '/assets/backend/img/baiviet/' . $this->hinhanh . '?' . rand(0, 99999) : "",
        ];
    }
}
