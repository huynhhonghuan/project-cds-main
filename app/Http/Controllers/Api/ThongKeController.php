<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use App\Models\Mucdo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Continue_;

class ThongKeController extends Controller
{
    public function mucdo()
    {
        $khaoSatMoiNhats = Khaosat::select('khaosat.*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('khaosat')
                    ->groupBy('doanhnghiep_id');
            })
            ->with(['getMucDo'])
            ->get();

        $count = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
        ];

        foreach ($khaoSatMoiNhats as $khaoSat) {
            $mucDoId = $khaoSat->getMucDo?->id;

            if (!isset($mucDoId))
                continue;

            if (!isset($count[$mucDoId])) {
                $count[$mucDoId] = 1;
            } else {
                $count[$mucDoId]++;
            }
        }

        return $count;
    }
}
