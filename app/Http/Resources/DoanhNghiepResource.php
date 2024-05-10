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
            'website' => $this->website,
            'fax' => $this->fax,
            'soLuongNhanSu' => $this->soluongnhansu,
            'sdt' => $this->sdt,
            'moTa' => $this->mota,
            'loaiHinh' => new LoaiHinhDoanhNghiepResource($this->getLoaiHinh),
            'nganhNghe' => new NganhNgheResource($this->getNganhNghe),
            'linhVuc' => new LinhVucResource($this->getLinhVuc),
            'daiDien' => new DaiDienDoanhNghiepResource($this->getDaiDien),
            'sdts' => DienThoaiResource::collection($this->getSdts),
            'user' => new UserResource($this->getUser),
            'nhuCau' =>  NhuCauResource::collection($this->getNhuCau),
            'khaoSat' => KhaoSatResource::collection($this->getKhaoSat->sortByDesc('id')),
            'thanhTich' => ThanhTichResource::collection($this->getThanhTich),
            'hoiVien' => $this->hoivien,
            'hoSoNangLuc' => $this->hosonangluc,
            'namGiaNhap' => $this->namgianhap,
        ];
    }
}
