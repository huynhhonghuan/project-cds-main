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

class CongtacvienExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        return [
            'Sheet1' => new Taikhoan(),
            'Sheet2' => new Vaitro(),
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
            if ($value->getvaitro[0]->id != "ctv")
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
            if ($value->vaitro_id != 'ctv')
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
