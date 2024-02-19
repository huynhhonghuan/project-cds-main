<?php

namespace App\Exports;

use App\Models\Cauhoiphieu1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class Phieu1Export implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cauhoiphieu1::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'tencauhoi',
            'noidung',
            'tieude',
            'cauhoiphieu1_id',
        ];
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->tencauhoi,
            $row->noidung,
            $row->tieude,
            $row->cauhoiphieu1_id,
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
}
