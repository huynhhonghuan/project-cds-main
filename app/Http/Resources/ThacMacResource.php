<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThacMacResource extends JsonResource
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
            'user' => new UserResource($this->getUser),
            'doanhNghiep' => new DoanhNghiepResource($this->getDoanhNghiep),
            'noiDung' => $this->noidung,
            'traLoi' => $this->traloi,
            'ngayTraLoi' => $this->ngaytraloi,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
