<?php

namespace App\Imports\Taikhoan;

use App\Models\Danhgiaphieu1;
use App\Models\Danhgiaphieu2;
use App\Models\Danhgiaphieu3;
use App\Models\Danhgiaphieu4;
use App\Models\Danhsachphieu1;
use App\Models\Danhsachphieu2;
use App\Models\Danhsachphieu3;
use App\Models\Danhsachphieu4;
use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Ketquaphieu1;
use App\Models\Khaosat;
use App\Models\User;
use App\Models\User_Vaitro;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use Faker\Factory as Faker;


class DoanhnghiepImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Nhập Liệu' => new Taikhoan(),
            // 'vaitro' => new Vaitro(),
            // 'doanhnghiep' => new Doanhnghiep(),
            // 'daidien' => new Daidien(),
        ];
    }
}
// class Taikhoan implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if (!$row['id'])
//             return null;
//         return new User([
//             'id' => $row['id'],
//             'name' => $row['name'],
//             'email' => $row['email'],
//             'phone' => $row['phone'],
//             'password' => Hash::needsRehash($row['password']) == true ?  Hash::make($row['password']) : $row['password'],
//             'image' => $row['image'],
//             'status' => $row['status'],
//         ]);
//     }
// }
// class Vaitro implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if (!$row['user_id'])
//             return null;
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
//         if (!$row['id'])
//             return null;
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
//         if (!$row['id'])
//             return null;
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


class Taikhoan implements ToModel, WithHeadingRow
{
    public function generateRandomEmail()
    {
        $firstName = strtolower(substr(md5(uniqid()), 0, 8));
        $lastName = strtolower(substr(md5(uniqid()), 0, 8));
        $domain = ['gmail.com', 'yahoo.com', 'hotmail.com'];
        $randomDomain = $domain[array_rand($domain)];
        $email = $firstName . '.' . $lastName . '@' . $randomDomain;
        return $email;
    }
    public function headingRow(): int
    {
        return 3;
    }
    public function model(array $row)
    {
        // dd($row[111]);
        if (!$row['stt'])
            return null;

        $dn = ModelsDoanhnghiep::where('tentiengviet', 'LIKE', '%' . $row['ten_doanh_nghiep'])->first();
        $dt = User::where('phone', $row['dien_thoai'])->whereNotNull('phone')->first();
        $e = User::where('email', $row['e_mail'])->whereNotNull('email')->first();

        // dump($dn, $dt, $e);

        if ($dt || $e || $dn) {
            return null;
        }

        // dd($row[111]);


        $email = $row['e_mail'];
        do {
            if (!$email)
                $email = $this->generateRandomEmail();
        } while (User::where('email', $email)->exists());

        $user = User::create([
            'name' => $row['nguoi_dai_dien'],
            'email' => str_replace([' '], '', $email),
            'phone' => str_replace(['.', ' '], '', $row['dien_thoai']) != '' ? str_replace(['.', ' '], '', $row['dien_thoai']) : null,
            'password' => Hash::make('12345678'),
            'image' => null,
            'status' => 'Active',
        ]);
        User_Vaitro::create([
            'user_id' => $user->id,
            'vaitro_id' => 'dn',
            'cap_vaitro_id' => 'ad',
            'duyet_user_id' => '1',
        ]);

        $dn_loaihinh = [];

        foreach (Doanhnghiep_Loaihinh::get() as $v) {
            $dn_loaihinh[] = $v->id;
        }

        $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::where('tenloaihinh', 'LIKE', '%' . $row['linh_vuc_hoat_dong'] . '%')->first();

        $doanhnghiep = ModelsDoanhnghiep::create([
            'user_id' => $user->id,
            'doanhnghiep_loaihinh_id' => $doanhnghiep_loaihinh->id ?? array_rand($dn_loaihinh),
            'tentiengviet' => $row['ten_doanh_nghiep'],
            'tentienganh' => $row['ten_doanh_nghiep'],
            'thanhpho' => null,
            'huyen' => null,
            'xa' => null,
            'diachi' => $row['dia_chi'],
            'mathue' => null,
            'fax' => $row['fax'],
            'soluongnhansu' => 100,
            'ngaylap' => date('Y-m-d', intval($row['ngay_thanh_lap'])),
            'mota' => null,
        ]);
        Doanhnghiep_Daidien::create([
            'doanhnghiep_id' => $doanhnghiep->id,
            'tendaidien' => $row['nguoi_dai_dien'] ?? 'Nguyễn Văn A',
            'email' => null,
            'sdt' => null,
            'thanhpho' => null,
            'huyen' => null,
            'xa' => null,
            'diachi' => null,
            'cccd' => null,
            'img_mattruoc' => null,
            'img_matsau' => null,
            'chucvu' => 'Quản lý',
        ]);

        $khaosat = Khaosat::create([
            'doanhnghiep_id' => $doanhnghiep->id,
            'thoigiantao' => date('Y-m-d'),
            'tongdiem' => 0,
            'trangthai' => 1,
        ]);

        $danhsachphieu1 = Danhsachphieu1::create([
            'khaosat_id' => $khaosat->id,
            'tendanhgia' => 'TỔNG HỢP THÔNG TIN CHỈ SỐ ĐÁNH GIÁ MỨC ĐỘ CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP',
            'diem' => 0,
            'soluonghoanthanh' => 60,
            'trangthai' => 1,
        ]);

        $lables_phieu_1 = [
            4 => [$row[111] ? $row[111] : 0, 1],
            5 => [$row[112] ? $row[112] : 0, 1],
            6 => [$row[113] ? $row[113] : 0, 1],
            8 => [$row[114] ? $row[114] : 0, 1],
            9 => [$row[115] ? $row[115] : 0, 1],
            10 => [$row[116] ? $row[116] : 0, 1],
            11 => [$row[117] ? $row[117] : 0, 1],
            12 => [$row[118] ? $row[118] : 0, 1],
            13 => [$row[119] ? $row[119] : 0, 1],
            16 => [$row[121] ? $row[121] : 0, 1],
            17 => [$row[122] ? $row[122] : 0, 1],
            18 => [$row[123] ? $row[123] : 0, 1],
            19 => [$row[124] ? $row[124] : 0, 1],

            22 => [$row[211] ? $row[211] : 0, 2],

            26 => [$row[311] ? $row[311] : 0, 3],
            28 => [$row[312] ? $row[312] : 0, 3],
            31 => [$row[321] ? $row[321] : 0, 3],
            32 => [$row[322] ? $row[322] : 0, 3],
            33 => [$row[323] ? $row[323] : 0, 3],
            34 => [$row[324] ? $row[324] : 0, 3],
            36 => [$row[325] ? $row[325] : 0, 3],
            37 => [$row[326] ? $row[326] : 0, 3],
            38 => [$row[327] ? $row[327] : 0, 3],
            39 => [$row[328] ? $row[328] : 0, 3],
            40 => [$row[329] ? $row[329] : 0, 3],
            41 => [$row[3210] ? $row[3210] : 0, 3],
            43 => [$row[3211] ? $row[3211] : 0, 3],
            44 => [$row[3212] ? $row[3212] : 0, 3],
            45 => [$row[3213] ? $row[3213] : 0, 3],
            46 => [$row[3214] ? $row[3214] : 0, 3],

            50 => [$row[411] ? $row[411] : 0, 4],
            51 => [$row[412] ? $row[412] : 0, 4],
            52 => [$row[413] ? $row[413] : 0, 4],
            53 => [$row[414] ? $row[414] : 0, 4],
            54 => [$row[415] ? $row[415] : 0, 4],
            55 => [$row[416] ? $row[416] : 0, 4],
            58 => [$row[421] ? $row[421] : 0, 4],
            59 => [$row[422] ? $row[422] : 0, 4],
            60 => [$row[423] ? $row[423] : 0, 4],
            62 => [$row[424] ? $row[424] : 0, 4],
            63 => [$row[425] ? $row[425] : 0, 4],
            64 => [$row[426] ? $row[426] : 0, 4],
            65 => [$row[427] ? $row[427] : 0, 4],

            69 => [$row[511] ? $row[511] : 0, 5],
            70 => [$row[512] ? $row[512] : 0, 5],
            71 => [$row[513] ? $row[513] : 0, 5],
            72 => [$row[514] ? $row[514] : 0, 5],
            73 => [$row[515] ? $row[515] : 0, 5],
            76 => [$row[521] ? $row[521] : 0, 5],
            77 => [$row[522] ? $row[522] : 0, 5],
            78 => [$row[523] ? $row[523] : 0, 5],
            79 => [$row[524] ? $row[524] : 0, 5],
            80 => [$row[525] ? $row[525] : 0, 5],

            84 => [$row[611] ? $row[611] : 0, 6],
            85 => [$row[612] ? $row[612] : 0, 6],
            86 => [$row[613] ? $row[613] : 0, 6],
            87 => [$row[614] ? $row[614] : 0, 6],
            88 => [$row[615] ? $row[615] : 0, 6],
            89 => [$row[616] ? $row[616] : 0, 6],
            90 => [$row[617] ? $row[617] : 0, 6],
        ];

        $d1 = 0;
        $d2 = 0;
        $d3 = 0;
        $d4 = 0;
        $d5 = 0;
        $d6 = 0;

        // dd($lables_phieu_1);

        foreach ($lables_phieu_1 as $key => $value) {
            Danhgiaphieu1::create([
                'danhsachphieu1_id' => $danhsachphieu1->id,
                'cauhoiphieu1_id' => $key,
                'diem' => $value[0],
                'trangthai' => 1,
            ]);
            if ($value[1] == 1) {
                $d1 += $value[0];
            }
            if ($value[1] == 2) {
                $d2 += $value[0];
            }
            if ($value[1] == 3) {
                $d3 += $value[0];
            }
            if ($value[1] == 4) {
                $d4 += $value[0];
            }
            if ($value[1] == 5) {
                $d5 += $value[0];
            }
            if ($value[1] == 6) {
                $d6 += $value[0];
            }
        }

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 1,
            'phantram' => (round(($d1 / 65) / 6 * 100, 2)) ?? 0,
        ]);

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 2,
            'phantram' => (round(($d2 / 25) / 6 * 100, 2)) ?? 0,
        ]);

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 3,
            'phantram' => (round(($d3 / 80) / 6 * 100, 2)) ?? 0,
        ]);

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 4,
            'phantram' => (round(($d4 / 65) / 6 * 100, 2)) ?? 0,
        ]);

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 5,
            'phantram' => (round(($d5 / 50) / 6 * 100, 2)) ?? 0,
        ]);

        Ketquaphieu1::create([
            'danhsachphieu1_id' => $danhsachphieu1->id,
            'mohinh_trucot_id' => 6,
            'phantram' => (round(($d6 / 35) / 6 * 100, 2)) ?? 0,
        ]);

        $khaosat->update([
            'tongdiem' => ($d1 + $d2 + $d3 + $d4 + $d5 + $d6) ?? 0,
        ]);

        $danhsachphieu1->update([
            'diem' => ($d1 + $d2 + $d3 + $d4 + $d5 + $d6) ?? 0,
        ]);

        $danhsachphieu2 = Danhsachphieu2::create([
            'khaosat_id' => $khaosat->id,
            'tendanhgia' => 'CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP NHỎ VÀ VỪA',
            'diem' => 0,
            'soluonghoanthanh' => 29,
            'trangthai' => 1,
        ]);

        $lables_phieu_2 = [
            2 => $row['711'],
            3 => $row['712'],
            4 => $row['713'],
            5 => $row['714'],
            6 => $row['715'],

            9 => $row['721'],
            10 => $row['722'],
            11 => $row['723'],
            12 => $row['724'],
            13 => $row['725'],

            14 => $row['731'],
            15 => $row['732'],
            16 => $row['733'],
            17 => $row['734'],
            18 => $row['735'],

            20 => $row['741'],
            21 => $row['742'],
            22 => $row['743'],
            23 => $row['744'],
            24 => $row['745'],

            26 => $row['751'],
            27 => $row['752'],
            28 => $row['753'],
            29 => $row['754'],

            31 => $row['761'],
            32 => $row['762'],
            33 => $row['763'],
            34 => $row['764'],
            35 => $row['765'],
        ];

        $tongdiem_lables_2 = 0;

        foreach ($lables_phieu_2 as $key => $value) {
            Danhgiaphieu2::create([
                'danhsachphieu2_id' => $danhsachphieu2->id,
                'cauhoiphieu2_id' => $key,
                'diem' => $value,
                'trangthai' => 1,
            ]);
            $tongdiem_lables_2 += $value;
        }

        $danhsachphieu2->update([
            'diem' => $tongdiem_lables_2,
        ]);

        $danhsachphieu3 = Danhsachphieu3::create([
            'khaosat_id' => $khaosat->id,
            'tendanhgia' => 'RÀO CẢN CHUYỂN ĐỔI SỐ TRONG DOANH NGHIỆP NHỎ VÀ VỪA',
            'diem' => 0,
            'soluonghoanthanh' => 9,
            'trangthai' => 1,
        ]);

        $lables_phieu_3 = [
            1 => $row['81'],
            2 => $row['82'],
            3 => $row['83'],
            4 => $row['84'],
            5 => $row['85'],
            6 => $row['86'],
            7 => $row['87'],
            8 => $row['88'],
            9 => $row['89'],
        ];

        $tongdiem_lables_3 = 0;
        foreach ($lables_phieu_3 as $key => $value) {
            Danhgiaphieu3::create([
                'danhsachphieu3_id' => $danhsachphieu3->id,
                'cauhoiphieu3_id' => $key,
                'diem' => $value,
                'trangthai' => 1,
            ]);
            $tongdiem_lables_3 += $value;
        }
        $danhsachphieu3->update([
            'diem' => $tongdiem_lables_3,
        ]);

        $danhsachphieu4 = Danhsachphieu4::create([
            'khaosat_id' => $khaosat->id,
            'tendanhgia' => 'Ý KIẾN CỦA DOANH NGHIỆP VỀ CHUYỂN ĐỔI SỐ',
            'soluonghoanthanh' => 2,
            'trangthai' => 1,
        ]);

        Danhgiaphieu4::create([
            'danhsachphieu4_id' => $danhsachphieu4->id,
            'noidungnhucau' => $row['nhu_cau'] ?? "Không",
            'noidungdexuat' => $row['hoidap'] ?? "Không",
            'trangthai' => 1,
        ]);
    }
}
