<?php

namespace App\Imports;

use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CauhoiImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new Phieu1(),
            'Sheet2' => new Phieu2(),
            'Sheet3' => new Phieu3(),
        ];
    }
}

class Phieu1 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Cauhoiphieu1([
            'id' => $row['id'],
            'tencauhoi' => $row['tencauhoi'],
            'noidung' => $row['noidung'],
            'tieude' => $row['tieude'],
            'cauhoiphieu1_id' => $row['cauhoiphieu1_id'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}

class Phieu2 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Cauhoiphieu2([
            'id' => $row['id'],
            'tencauhoi' => $row['tencauhoi'],
            'cauhoiphieu2_id' => $row['cauhoiphieu2_id'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}

class Phieu3 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Cauhoiphieu3([
            'id' => $row['id'],
            'tencauhoi' => $row['tencauhoi'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
