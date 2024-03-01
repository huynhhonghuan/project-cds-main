<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DaiDienHiepHoiResource extends JsonResource
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
            'tenDaiDien' =>  $this->tendaidien,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'moTa' => $this->mota
        ];
    }
}
