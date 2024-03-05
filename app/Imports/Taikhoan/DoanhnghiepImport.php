<?php

namespace App\Imports\Taikhoan;

use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\User;
use App\Models\User_Vaitro;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DoanhnghiepImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Thông tin tài khoản' => new Taikhoan(),
            'Thông tin vai trò tài khoản' => new Vaitro(),
            'Thông tin doanh nghiệp' => new Doanhnghiep(),
            'Thông tin đại diện doanh nghiệp' => new Daidien(),
        ];
    }
}
class Taikhoan implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => $row['password'] != null ? $row['password'] : Hash::make('12345678'),
            'image' => $row['image'],
            'status' => $row['status'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
class Vaitro implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User_Vaitro([
            // 'id' => $row['id'],
            'user_id' => $row['user_id'],
            'vaitro_id' => $row['vaitro_id'],
            'cap_vaitro_id' => $row['cap_vaitro_id'],
            'duyet_user_id' => $row['duyet_user_id'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
class Doanhnghiep implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ModelsDoanhnghiep([
            'id' => $row['id'],
            'user_id' => $row['user_id'],
            'doanhnghiep_loaihinh_id' => $row['doanhnghiep_loaihinh_id'],
            'tentiengviet' => $row['tentiengviet'],
            'tentienganh' => $row['tentienganh'],
            'thanhpho' => $row['thanhpho'],
            'huyen' => $row['huyen'],
            'xa' => $row['xa'],
            'diachi' => $row['diachi'],
            'sdt' => $row['sdt'],
            'mathue' => $row['mathue'],
            'fax' => $row['fax'],
            'soluongnhansu' => $row['soluongnhansu'],
            'ngaylap' => $row['ngaylap'],
            'mota' => $row['mota'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
class Daidien implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Doanhnghiep_Daidien([
            'id' => $row['id'],
            'doanhnghiep_id' => $row['doanhnghiep_id'],
            'tendaidien' => $row['tendaidien'],
            'email' => $row['email'],
            'sdt' => $row['sdt'],
            'thanhpho' => $row['thanhpho'],
            'huyen' => $row['huyen'],
            'xa' => $row['xa'],
            'diachi' => $row['diachi'],
            'cccd' => $row['cccd'],
            'img_mattruoc' => $row['img_mattruoc'],
            'img_matsau' => $row['img_mattruoc'],
            'chucvu' => $row['chucvu'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
