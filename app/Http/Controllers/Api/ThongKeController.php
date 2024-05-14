<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
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

    public function soluongdoanhnghiep()
    {
        $huyens = [
            [
                'id' => 883,
                'name' => 'Long Xuyên',
            ],
            [
                'id' => 884,
                'name' => 'Châu Đốc',
            ],
            [
                'id' => 886,
                'name' => 'An Phú',
            ],
            [
                'id' => 887,
                'name' => 'Tân Châu',
            ],
            [
                'id' => 888,
                'name' => 'Phú Tân',
            ],
            [
                'id' => 889,
                'name' => 'Châu Phú',
            ],
            [
                'id' => 890,
                'name' => 'Tịnh Biên',
            ],
            [
                'id' => 891,
                'name' => 'Tri Tôn',
            ],
            [
                'id' => 892,
                'name' => 'Châu Thành',
            ],
            [
                'id' => 893,
                'name' => 'Chợ Mới',
            ],
            [
                'id' => 894,
                'name' => 'Thoại Sơn',
            ],
        ];
        $result = [];
        $dns = Doanhnghiep::get();
        foreach ($huyens as $huyen) {
            $doanhnghiep_huyen = $dns->where('huyen', $huyen['id']);
            $cn = 0;
            $kh = 0;
            $nn = 0;
            $tmdv = 0;
            foreach ($doanhnghiep_huyen as $dn) {
                if ($dn?->getLinhVuc?->id == 'cn') {
                    $cn++;
                } elseif ($dn?->getLinhVuc?->id == 'kh') {
                    $kh++;
                } elseif ($dn?->getLinhVuc?->id == 'nn') {
                    $nn++;
                } elseif ($dn?->getLinhVuc?->id == 'tmdv') {
                    $tmdv++;
                }
            }
            $result[] = [
                'huyen' => $huyen['name'],
                'cn' => $cn,
                'kh' => $kh,
                'nn' => $nn,
                'tmdv' => $tmdv,
            ];
        }
        return $result;
    }

    public function mucdotheohuyen()
    {
        $huyens = [
            [
                'id' => 883,
                'name' => 'Long Xuyên',
            ],
            [
                'id' => 884,
                'name' => 'Châu Đốc',
            ],
            [
                'id' => 886,
                'name' => 'An Phú',
            ],
            [
                'id' => 887,
                'name' => 'Tân Châu',
            ],
            [
                'id' => 888,
                'name' => 'Phú Tân',
            ],
            [
                'id' => 889,
                'name' => 'Châu Phú',
            ],
            [
                'id' => 890,
                'name' => 'Tịnh Biên',
            ],
            [
                'id' => 891,
                'name' => 'Tri Tôn',
            ],
            [
                'id' => 892,
                'name' => 'Châu Thành',
            ],
            [
                'id' => 893,
                'name' => 'Chợ Mới',
            ],
            [
                'id' => 894,
                'name' => 'Thoại Sơn',
            ],
        ];
        // tất cả khảo sát mới nhất của doanh nghiệp
        $khaoSatMoiNhats = Khaosat::select('khaosat.*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('khaosat')
                    ->groupBy('doanhnghiep_id');
            })
            ->get();


        $tongMucDoTheoHuyen = [
            'Long Xuyên' => 0,
            'Châu Đốc' => 0,
            'An Phú' => 0,
            'Tân Châu' => 0,
            'Phú Tân' => 0,
            'Châu Phú' => 0,
            'Tịnh Biên' => 0,
            'Tri Tôn' => 0,
            'Châu Thành' => 0,
            'Chợ Mới' => 0,
            'Thoại Sơn' => 0,
        ];
        $count = [
            'Long Xuyên' => 0,
            'Châu Đốc' => 0,
            'An Phú' => 0,
            'Tân Châu' => 0,
            'Phú Tân' => 0,
            'Châu Phú' => 0,
            'Tịnh Biên' => 0,
            'Tri Tôn' => 0,
            'Châu Thành' => 0,
            'Chợ Mới' => 0,
            'Thoại Sơn' => 0,
        ];
        foreach ($khaoSatMoiNhats as $khaoSat) {
            $huyenId = $khaoSat?->getDoanhNghiep?->huyen;
            $mucdo = ($khaoSat?->getMucDo?->id ? $khaoSat?->getMucDo?->id - 1 : null);
            $huyenName = '';
            foreach ($huyens as $huyen) {
                if ($huyen['id'] == $huyenId) {
                    $huyenName = $huyen['name'];
                    break;
                }
            }
            if ($huyenName == '' || !$huyenId || !$mucdo)
                continue;

            $tongMucDoTheoHuyen[$huyenName] =  $tongMucDoTheoHuyen[$huyenName] + $mucdo;

            $count[$huyenName] =  $count[$huyenName] + 1;
        }

        foreach ($tongMucDoTheoHuyen as $key => $value) {
            if ($count[$key] != 0)
                $tongMucDoTheoHuyen[$key] = $value / $count[$key];
        }

        return $tongMucDoTheoHuyen;
    }
}
