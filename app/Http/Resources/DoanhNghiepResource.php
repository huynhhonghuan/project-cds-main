<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoanhNghiepResource extends JsonResource
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
            'tenTiengViet' => $this->tentiengviet,
            'tenTiengAnh' => $this->tentienganh,
            'tenVietTat' => $this->tenviettat,
            'ngayLap' => $this->ngaylap,
            'thanhPho' => $this->thanhpho,
            'huyen' => $this->huyen,
            'xa' => $this->xa,
            'diaChi' => $this->diachi,
            'maThue' => $this->mathue,
            'fax' => $this->fax,
            'soLuongNhanSu' => $this->soluongnhansu,
            'moTa' => $this->mota,
            'loaiHinh' => new LoaiHinhDoanhNghiepResource($this->getLoaiHinh),
            'daiDien' => new DaiDienDoanhNghiepResource($this->getDaiDien),
            'sdts' => DienThoaiResource::collection($this->getSdts),
        ];
    }
}
