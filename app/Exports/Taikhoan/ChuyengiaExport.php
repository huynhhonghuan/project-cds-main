<?php

namespace App\Exports\Taikhoan;

use App\Models\Chuyengia as ModelsChuyengia;
use App\Models\User;
use App\Models\User_Vaitro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class ChuyengiaExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        return [
            'Sheet1' => new Taikhoan(),
            'Sheet2' => new Vaitro(),
            'Sheet3' => new Chuyengia(),
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
            if ($value->getvaitro[0]->id != "cg")
                unset($user[$key]);
        }
        return $user;
    }
    public function headings(): array
    {
        return [
            'id',
            'email',
            'password',
            'image',
            'status',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->email,
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
        return 'Thông tin tài khoản';
    }
}
class Vaitro implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        $user_vaitro = User_Vaitro::all();
        foreach ($user_vaitro as $key => $value) {
            if ($value->vaitro_id != 'cg')
                unset($user_vaitro[$key]);
        }
        return $user_vaitro;
    }
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'vaitro_id',
            'cap_vaitro_id',
            'duyet_user_id',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->user_id,
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
        return 'Thông tin vai trò tài khoản';
    }
}


class Chuyengia implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping, WithTitle
{
    public function collection()
    {
        return ModelsChuyengia::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'linhvuc_id',
            'tenchuyengia',
            'sdt',
            'thanhpho',
            'huyen',
            'xa',
            'diachi',
            'cccd',
            'img_mattruoc',
            'img_matsau',
            'mota',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->user_id,
            $row->linhvuc_id,
            $row->tenchuyengia,
            $row->sdt,
            $row->thanhpho,
            $row->huyen,
            $row->xa,
            $row->diachi,
            $row->cccd,
            $row->img_mattruoc,
            $row->img_matsau,
            $row->mota,
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function title(): string
    {
        return 'Thông tin chuyên gia';
    }
}
