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
            'taikhoan' => new Taikhoan(),
            // 'vaitro' => new Vaitro(),
            // 'doanhnghiep' => new Doanhnghiep(),
            // 'daidien' => new Daidien(),
        ];
    }
}
class Taikhoan implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if ($row[0] == "user") {
            return new User([
                'id' => $row[1],
                'name' => $row[2],
                'email' => $row[3],
                'phone' => $row[4],
                'password' => Hash::needsRehash($row[5]) == true ?  Hash::make($row[5]) : $row[5],
                'image' => $row[6],
                'status' => $row[7],
            ]);
        }
        // dd($row["table"] == "vaitro");
        if ($row[0] == "vaitro") {
            // dd($row);
            return new User_Vaitro([
                'user_id' => $row[1],
                'vaitro_id' => $row[2],
                'cap_vaitro_id' => $row[3],
                'duyet_user_id' => $row[4],
            ]);
        }

        if ($row[0] == "doanhnghiep") {
            // dd($row);
            return new ModelsDoanhnghiep([
                'id' => $row[1],
                'user_id' => $row[2],
                'doanhnghiep_loaihinh_id' => $row[3],
                'tentiengviet' => $row[4],
                'tentienganh' => $row[5],
                'thanhpho' => $row[6],
                'huyen' => $row[7],
                'xa' => $row[8],
                'diachi' => $row[9],
                // 'sdt' => $row['sdt'],
                'mathue' => $row[10],
                'fax' => $row[11],
                'soluongnhansu' => $row[12],
                'ngaylap' => $row[13],
                'mota' => $row[14],
            ]);
        }
        if ($row[0] == "daidien")
            return new Doanhnghiep_Daidien([
                'id' => $row[1],
                'doanhnghiep_id' => $row[2],
                'tendaidien' => $row[3],
                'email' => $row[4],
                'sdt' => $row[5],
                'thanhpho' => $row[6],
                'huyen' => $row[7],
                'xa' => $row[8],
                'diachi' => $row[9],
                'cccd' => $row[10],
                'img_mattruoc' => $row[11],
                'img_matsau' => $row[12],
                'chucvu' => $row[13],
            ]);
    }
}
// class Vaitro implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         return new User_Vaitro([
//             // 'id' => $row['id'],
//             'user_id' => $row['user_id'],
//             'vaitro_id' => $row['vaitro_id'],
//             'cap_vaitro_id' => $row['cap_vaitro_id'],
//             'duyet_user_id' => $row['duyet_user_id'],
//         ]);
//     }
//     public function headingRow(): int
//     {
//         return 1;
//     }
// }
// class Doanhnghiep implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         return new ModelsDoanhnghiep([
//             'id' => $row['id'],
//             'user_id' => $row['user_id'],
//             'doanhnghiep_loaihinh_id' => $row['doanhnghiep_loaihinh_id'],
//             'tentiengviet' => $row['tentiengviet'],
//             'tentienganh' => $row['tentienganh'],
//             'thanhpho' => $row['thanhpho'],
//             'huyen' => $row['huyen'],
//             'xa' => $row['xa'],
//             'diachi' => $row['diachi'],
//             // 'sdt' => $row['sdt'],
//             'mathue' => $row['mathue'],
//             'fax' => $row['fax'],
//             'soluongnhansu' => $row['soluongnhansu'],
//             'ngaylap' => $row['ngaylap'],
//             'mota' => $row['mota'],
//         ]);
//     }
//     public function headingRow(): int
//     {
//         return 1;
//     }
// }
// class Daidien implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         return new Doanhnghiep_Daidien([
//             'id' => $row['id'],
//             'doanhnghiep_id' => $row['doanhnghiep_id'],
//             'tendaidien' => $row['tendaidien'],
//             'email' => $row['email'],
//             'sdt' => $row['sdt'],
//             'thanhpho' => $row['thanhpho'],
//             'huyen' => $row['huyen'],
//             'xa' => $row['xa'],
//             'diachi' => $row['diachi'],
//             'cccd' => $row['cccd'],
//             'img_mattruoc' => $row['img_mattruoc'],
//             'img_matsau' => $row['img_mattruoc'],
//             'chucvu' => $row['chucvu'],
//         ]);
//     }
//     public function headingRow(): int
//     {
//         return 1;
//     }
// }
