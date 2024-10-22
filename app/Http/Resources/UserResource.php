<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image ? env('APP_IMAGE_URL') . '/assets/backend/img/hoso/' . $this->image . '?' . rand(0, 99999) : "",
            'status' => $this->status,
            'vaitro' => VaiTroResource::collection($this->getVaiTro)
        ];
    }
}
