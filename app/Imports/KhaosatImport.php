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
            'phieu1' => new Phieu1(),
            'ketquaphieu1' => new Ketquaphieu1(),
            'phieu2' => new Phieu2(),
            'phieu3' => new Phieu3(),
            'denghiphieu3' => new Denghiphieu3(),
            'phieu4' => new Phieu4(),
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
class Phieu1 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Danhgiaphieu1([
            'danhsachphieu1_id' => $row['danhsachphieu1_id'],
            'cauhoiphieu1_id' => $row['cauhoiphieu1_id'],
            'diem' => $row['diem'],
            'trangthai' => $row['trangthai'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
class Ketquaphieu1 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ModelsKetquaphieu1([
            'danhsachphieu1_id' => $row['danhsachphieu1_id'],
            'mohinh_trucot_id' => $row['mohinh_trucot_id'],
            'phantram' => $row['phantram'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}


class Phieu2 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Danhgiaphieu2([
            'danhsachphieu2_id' => $row['danhsachphieu2_id'],
            'cauhoiphieu2_id' => $row['cauhoiphieu2_id'],
            'diem' => $row['diem'],
            'trangthai' => $row['trangthai'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
class Phieu3 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Danhgiaphieu3([
            'danhsachphieu3_id' => $row['danhsachphieu3_id'],
            'cauhoiphieu3_id' => $row['cauhoiphieu3_id'],
            'diem' => $row['diem'],
            'trangthai' => $row['trangthai'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
class Denghiphieu3 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ModelsDenghiphieu3([
            'danhsachphieu3_id' => $row['danhsachphieu3_id'],
            'noidung' => $row['noidung'] != null ? $row['noidung'] : "Không",
            'trangthai' => $row['trangthai'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}

class Phieu4 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Danhgiaphieu4([
            'danhsachphieu4_id' => $row['danhsachphieu4_id'],
            'noidungnhucau' => $row['noidungnhucau'] != null ? $row['noidungnhucau'] : "Không",
            'noidungdexuat' => $row['noidungdexuat'] != null ? $row['noidungdexuat'] : "Không",
            'trangthai' => $row['trangthai'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
