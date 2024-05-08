<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use Illuminate\Http\Request;

class ThongkechungController extends Controller
{
    public function getdanhsach()
    {
        return view('trangquanly.admin.thongkechung.danhsach');
    }

    public function thongke()
    {
        $thongke = [
            'bieudo2' => $this->phanbodoanhnghieptheohuyen(),
            'bieudo5' => $this->doanhnghiepphanbotheolinhvuc(),
        ];

        return response()->json($thongke);
    }

    public function phanbodoanhnghieptheohuyen()
    { // biểu đồ 2
        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)',
            'rgba(46, 223, 63, 0.5)',
            'rgba(33, 17, 134, 0.3)',
            'rgba(231, 30, 95, 0.3)',
            'rgba(231, 149, 30, 0.3)',
            'rgba(145, 32, 4, 0.3)'
        ];

        $khaosat_huyen_lables = [
            'Long Xuyên', //883
            'Châu Đốc', //884
            'An Phú', //886
            'Tân Châu', //887
            'Phú Tân', //888
            'Châu Phú', //889
            'Tịnh Biên', //890
            'Tri Tôn', //891
            'Châu Thành', //892
            'Chợ Mới', //893
            'Thoại Sơn' //894
        ];
        $lx = 0;
        $cd = 0;
        $ap = 0;
        $tc = 0;
        $pt = 0;
        $cp = 0;
        $tb = 0;
        $tt = 0;
        $ct = 0;
        $cm = 0;
        $ts = 0;

        foreach (Doanhnghiep::all() as $item) {
            $item->huyen == 883 ? $lx++ : '';
            $item->huyen == 884 ? $cd++ : '';
            $item->huyen == 886 ? $ap++ : '';
            $item->huyen == 887 ? $tc++ : '';
            $item->huyen == 888 ? $pt++ : '';
            $item->huyen == 889 ? $cp++ : '';
            $item->huyen == 890 ? $tb++ : '';
            $item->huyen == 891 ? $tt++ : '';
            $item->huyen == 892 ? $ct++ : '';
            $item->huyen == 893 ? $cm++ : '';
            $item->huyen == 894 ? $ts++ : '';
        }

        return [
            'id' => 2,
            'title' => 'Phân bổ doanh nghiệp theo Huyện/Thị',
            'colors' => $colors,
            'labels' => $khaosat_huyen_lables,
            'data' => [$lx, $cd, $ap, $tc, $pt, $cp, $tb, $tt, $ct, $cm, $ts],
        ];
    }

    public function mucdochuyendoisotheohuyen()
    { // biểu đồ 3
        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)',
            'rgba(46, 223, 63, 0.5)',
            'rgba(33, 17, 134, 0.3)',
            'rgba(231, 30, 95, 0.3)',
            'rgba(231, 149, 30, 0.3)',
            'rgba(145, 32, 4, 0.3)'
        ];

        $khaosat_huyen_lables = [
            'Long Xuyên', //883
            'Châu Đốc', //884
            'An Phú', //886
            'Tân Châu', //887
            'Phú Tân', //888
            'Châu Phú', //889
            'Tịnh Biên', //890
            'Tri Tôn', //891
            'Châu Thành', //892
            'Chợ Mới', //893
            'Thoại Sơn' //894
        ];
        $lx = 0;
        $cd = 0;
        $ap = 0;
        $tc = 0;
        $pt = 0;
        $cp = 0;
        $tb = 0;
        $tt = 0;
        $ct = 0;
        $cm = 0;
        $ts = 0;
    }

    public function phanbokhaosattheonganh()
    { //biểu đồ 4

    }

    public function doanhnghiepphanbotheolinhvuc()
    { // biểu đồ 5
        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
        ];
        $linhvuc_lables = [
            'Nông nghiệp',
            'Công nghiệp',
            'Thương mại và dịch vụ',
            'Khác',
        ];
        $nn = 0;
        $cn = 0;
        $tmdv = 0;
        $kh = 0;

        $count = Doanhnghiep::get()->count();

        foreach (Doanhnghiep::all() as $item) {
            $item->getloaihinh->linhvuc_id == 'nn' ? $nn++ : '';
            $item->getloaihinh->linhvuc_id == 'cn' ? $cn++ : '';
            $item->getloaihinh->linhvuc_id == 'tmdv' ? $tmdv++ : '';
            $item->getloaihinh->linhvuc_id == 'kh' ? $kh++ : '';
        }
        return [
            'id' => 5,
            'title' => 'Phân bổ doanh nghiệp theo lĩnh vực',
            'colors' => $colors,
            'labels' => $linhvuc_lables,
            'data' => [
                round($nn / $count * 100, 2),
                round($cn / $count * 100, 2),
                round($tmdv / $count * 100, 2),
                round($kh / $count * 100, 2)
            ],
        ];
    }

    public function mucdochuyendoisocuadoanhnghiep()
    { //biểu đồ 6

    }

    public function mucdochuyendoisocuadoanhnghiep6phiacanh()
    { //biểu đồ 7

    }

    public function mucdosansangchuyendoisotheonganh()
    { //biểu đồ 8

    }

    public function mucdosangsangtheolinhvuc()
    { //biểu đồ 10

    }
}
