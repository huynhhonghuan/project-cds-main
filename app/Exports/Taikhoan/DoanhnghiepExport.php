<?php

namespace App\Exports\Taikhoan;

use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\User;
use App\Models\User_Vaitro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class DoanhnghiepExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        return [
            'taikhoan' => new Taikhoan(),
            'vaitro' => new Vaitro(),
            'doanhnghiep' => new Doanhnghiep(),
            'daidien' => new Daidien(),
        ];
    }
}
class Taikhoan implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        $user = User::all();

        foreach ($user as $key => $value) {
            // dd($value->getvaitro[0]->id);
            if ($value->getvaitro[0]->id != "dn")
                unset($user[$key]);
        }
        return $user;
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'password',
            'image',
            'status',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->phone,
            $row->password,
            $row->image,
            $row->status,
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function title(): string
    {
        return 'taikhoan';
    }
}
class Vaitro implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        $user_vaitro = User_Vaitro::all();
        foreach ($user_vaitro as $key => $value) {
            if ($value->vaitro_id != 'dn')
                unset($user_vaitro[$key]);
        }
        return $user_vaitro;
    }
    public function headings(): array
    {
        return [
            // 'id',
            'user_id',
            'vaitro_id',
            'cap_vaitro_id',
            'duyet_user_id',
        ];
    }
    public function map($row): array
    {
        return [
            // $row->id,
            $row->user_id,
            $row->vaitro_id,
            $row->cap_vaitro_id,
            $row->duyet_user_id,
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function title(): string
    {
        return 'vaitro';
    }
}


class Doanhnghiep implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        return ModelsDoanhnghiep::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'doanhnghiep_loaihinh_id',
            'tentiengviet',
            'tentienganh',
            'thanhpho',
            'huyen',
            'xa',
            'diachi',
            // 'sdt',
            'mathue',
            'fax',
            'soluongnhansu',
            'ngaylap',
            'mota',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->user_id,
            $row->doanhnghiep_loaihinh_id,
            $row->tentiengviet,
            $row->tentienganh,
            $row->thanhpho,
            $row->huyen,
            $row->xa,
            $row->diachi,
            // $row->sdt,
            $row->mathue,
            $row->fax,
            $row->soluongnhansu,
            $row->ngaylap,
            $row->mota,
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function title(): string
    {
        return 'doanhnghiep';
    }
}

class Daidien implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        return Doanhnghiep_Daidien::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'doanhnghiep_id',
            'tendaidien',
            'email',
            'sdt',
            'thanhpho',
            'huyen',
            'xa',
            'diachi',
            'cccd',
            'img_mattruoc',
            'img_matsau',
            'chucvu',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->doanhnghiep_id,
            $row->tendaidien,
            $row->email,
            $row->sdt,
            $row->thanhpho,
            $row->huyen,
            $row->xa,
            $row->diachi,
            $row->cccd,
            $row->img_mattruoc,
            $row->img_matsau,
            $row->chucvu
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function title(): string
    {
        return 'daidien';
    }
}
