<?php

namespace App\Imports;

use App\Models\Danhgiaphieu1;
use App\Models\Danhgiaphieu2;
use App\Models\Danhgiaphieu3;
use App\Models\Danhgiaphieu4;
use App\Models\Danhsachphieu1;
use App\Models\Danhsachphieu2;
use App\Models\Danhsachphieu3;
use App\Models\Danhsachphieu4;
use App\Models\Denghiphieu3 as ModelsDenghiphieu3;
use App\Models\Ketquaphieu1 as ModelsKetquaphieu1;
use App\Models\Khaosat as ModelsKhaosat;
use Lcobucci\JWT\Token;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;



class KhaosatImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        //nếu excel có nhiều sheet thì tạo class mới và new class đó ở đây kèm theo tên sheet
        $sheet = [
            'khaosat' => new Khaosat(),
            'ketqua' => new Ketqua(),
        ];
        return $sheet;
    }
}

class Khaosat implements ToModel, WithHeadingRow
{
    private $string;

    public function model(array $row)
    {
        if ($row[0] == "khaosat") {
            $this->string = $row[0];
        }
        if ($row[0] == "danhsachphieu1") {
            $this->string = $row[0];
        }
        if ($row[0] == "danhsachphieu2") {
            $this->string = $row[0];
        }
        if ($row[0] == "danhsachphieu3") {
            $this->string = $row[0];
        }
        if ($row[0] == "danhsachphieu4") {
            $this->string = $row[0];
        }

        if ($this->string == "khaosat" && $row[1] != null && $row[0] != "id") {
            // dump($this->string);
            // dump($row);
            return new ModelsKhaosat([
                'id' => $row[0],
                'thoigiantao' => $row[1],
                'tongdiem' => $row[2] == null ? 0 : $row[2],
                'trangthai' => $row[3] == null ? 0 : $row[3],
                'doanhnghiep_id' => $row[4],
            ]);
        }
        if ($this->string == "danhsachphieu1" && $row[1] != null && $row[0] != "id") {
            // dump($this->string);
            // dump($row);
            return new Danhsachphieu1([
                'id' => $row[0],
                'khaosat_id' => $row[1],
                'tendanhgia' => $row[2] != null ? $row[2] : 'TỔNG HỢP THÔNG TIN CHỈ SỐ ĐÁNH GIÁ MỨC ĐỘ CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP',
                'diem' => $row[3] == null ? 0 : $row[3],
                'soluonghoanthanh' => $row[4],
                'trangthai' => $row[5],
            ]);
        }
        if ($this->string == "danhsachphieu2" && $row[1] != null && $row[0] != "id") {
            // dump($this->string);
            // dump($row);
            return new Danhsachphieu2([
                'id' => $row[0],
                'khaosat_id' => $row[1],
                'tendanhgia' => $row[2] != null ? $row[2] : 'CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP NHỎ VÀ VỪA',
                'diem' => $row[3] == null ? 0 : $row[3],
                'soluonghoanthanh' => $row[4],
                'trangthai' => $row[5],
            ]);
        }
        if ($this->string == "danhsachphieu3" && $row[1] != null && $row[0] != "id") {
            // dump($this->string);
            // dump($row);
            return new Danhsachphieu3([
                'id' => $row[0],
                'khaosat_id' => $row[1],
                'tendanhgia' => $row[2] != null ? $row[2] : 'RÀO CẢN CHUYỂN ĐỔI SỐ TRONG DOANH NGHIỆP NHỎ VÀ VỪA',
                'diem' => $row[3] == null ? 0 : $row[3],
                'soluonghoanthanh' => $row[4],
                'trangthai' => $row[5],
            ]);
        }
        if ($this->string == "danhsachphieu4" && $row[1] != null && $row[0] != "id") {
            // dump($this->string);
            // dump($row);
            return new Danhsachphieu4([
                'id' => $row[0],
                'khaosat_id' => $row[1],
                'tendanhgia' => $row[2] != null ? $row[2] : 'Ý KIẾN CỦA DOANH NGHIỆP VỀ CHUYỂN ĐỔI SỐ',
                'soluonghoanthanh' => $row[3],
                'trangthai' => $row[4],
            ]);
        }
    }
}
class Ketqua implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        //phiếu 1
        if ($row['danhsachphieu1_id'] != null && $row['cauhoiphieu1_id'] != null && $row['diem_1'] != null && $row['trangthai_1'] != null)
            Danhgiaphieu1::create([
                'danhsachphieu1_id' => $row['danhsachphieu1_id'],
                'cauhoiphieu1_id' => $row['cauhoiphieu1_id'],
                'diem' => $row['diem_1'],
                'trangthai' => $row['trangthai_1'],
            ]);
        //kết quả phiếu 1
        if ($row['danhsachphieu1_id_1'] != null && $row['mohinh_trucot_id'] != null && $row['phantram'] != null) {
            ModelsKetquaphieu1::create([
                'danhsachphieu1_id' => $row['danhsachphieu1_id_1'],
                'mohinh_trucot_id' => $row['mohinh_trucot_id'],
                'phantram' => $row['phantram'],
            ]);
        }
        //phiếu 2
        if ($row['danhsachphieu2_id'] != null && $row['cauhoiphieu2_id'] != null && $row['diem_2'] != null && $row['trangthai_2'] != null)
            Danhgiaphieu2::create([
                'danhsachphieu2_id' => $row['danhsachphieu2_id'],
                'cauhoiphieu2_id' => $row['cauhoiphieu2_id'],
                'diem' => $row['diem_2'],
                'trangthai' => $row['trangthai_2'],
            ]);
        //phiếu 3
        if ($row['danhsachphieu3_id'] != null && $row['cauhoiphieu3_id'] != null && $row['diem_3'] != null && $row['trangthai_3'] != null)
            Danhgiaphieu3::create([
                'danhsachphieu3_id' => $row['danhsachphieu3_id'],
                'cauhoiphieu3_id' => $row['cauhoiphieu3_id'],
                'diem' => $row['diem_3'],
                'trangthai' => $row['trangthai_3'],
            ]);
        //đề nghị phiếu 3
        if ($row['danhsachphieu3_id_3'] != null && $row['trangthai_3_3'] != null)
            ModelsDenghiphieu3::create([
                'danhsachphieu3_id' => $row['danhsachphieu3_id_3'],
                'noidung' => $row['noidung'] != null ? $row['noidung'] : "Không",
                'trangthai' => $row['trangthai_3_3'],
            ]);
        //phiếu 4
        if ($row['danhsachphieu4_id'] != null && $row['trangthai_4'] != null)
            Danhgiaphieu4::create([
                'danhsachphieu4_id' => $row['danhsachphieu4_id'],
                'noidungnhucau' => $row['noidungnhucau'] != null ? $row['noidungnhucau'] : "Không",
                'noidungdexuat' => $row['noidungdexuat'] != null ? $row['noidungdexuat'] : "Không",
                'trangthai' => $row['trangthai_4'],
            ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
// class Ketquaphieu1 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         // dump($row);
//         if ($row['danhsachphieu1_id_1'] != null && $row['mohinh_trucot_id'] != null && $row['phantram'] != null)
//             return new ModelsKetquaphieu1([
//                 'danhsachphieu1_id' => $row['danhsachphieu1_id_1'],
//                 'mohinh_trucot_id' => $row['mohinh_trucot_id'],
//                 'phantram' => $row['phantram'],
//             ]);
//     }
//     public function headingRow(): int
//     {
//         return 2;
//     }
// }
// class Phieu2 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if ($row['danhsachphieu2_id'] != null && $row['cauhoiphieu2_id'] != null && $row['diem_2'] != null && $row['trangthai_2'])
//             return new Danhgiaphieu2([
//                 'danhsachphieu2_id' => $row['danhsachphieu2_id'],
//                 'cauhoiphieu2_id' => $row['cauhoiphieu2_id'],
//                 'diem' => $row['diem_2'],
//                 'trangthai' => $row['trangthai_2'],
//             ]);
//     }
//     public function headingRow(): int
//     {
//         return 2;
//     }
// }
// class Phieu3 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if ($row['danhsachphieu3_id'] != null && $row['cauhoiphieu3_id'] != null && $row['diem_3'] != null && $row['trangthai_3'])
//             return new Danhgiaphieu3([
//                 'danhsachphieu3_id' => $row['danhsachphieu3_id'],
//                 'cauhoiphieu3_id' => $row['cauhoiphieu3_id'],
//                 'diem' => $row['diem_3'],
//                 'trangthai' => $row['trangthai_3'],
//             ]);
//     }
//     public function headingRow(): int
//     {
//         return 2;
//     }
// }
// class Denghiphieu3 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if ($row['danhsachphieu3_id_3'] != null && $row['noidung'] != null && $row['trangthai_3'] != null)
//             return new ModelsDenghiphieu3([
//                 'danhsachphieu3_id' => $row['danhsachphieu3_id_3'],
//                 'noidung' => $row['noidung'] != null ? $row['noidung'] : "Không",
//                 'trangthai' => $row['trangthai_3'],
//             ]);
//     }
//     public function headingRow(): int
//     {
//         return 2;
//     }
// }
// class Phieu4 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         if ($row['danhsachphieu4_id'] != null && $row['trangthai_4'] != null)
//             return new Danhgiaphieu4([
//                 'danhsachphieu4_id' => $row['danhsachphieu4_id'],
//                 'noidungnhucau' => $row['noidungnhucau'] != null ? $row['noidungnhucau'] : "Không",
//                 'noidungdexuat' => $row['noidungdexuat'] != null ? $row['noidungdexuat'] : "Không",
//                 'trangthai' => $row['trangthai_4'],
//             ]);
//     }
//     public function headingRow(): int
//     {
//         return 2;
//     }
// }
