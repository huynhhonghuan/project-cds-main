<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Khaosat;
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
            'bieudo3' => $this->mucdochuyendoisotheohuyen(),
            'bieudo4' => $this->phanbokhaosattheonganh(),
            'bieudo5' => $this->doanhnghiepphanbotheolinhvuc(),
            'bieudo6' => $this->mucdochuyendoisocuadoanhnghiep(),
            'bieudo7' => $this->mucdochuyendoisocuadoanhnghiep6phiacanh(),
            'bieudo8' => $this->mucdosansangchuyendoisotheonganh(),
            'bieudo10' => $this->mucdosangsangtheolinhvuc(),
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

        $lx_sl = 1;
        $cd_sl = 1;
        $ap_sl = 1;
        $tc_sl = 1;
        $pt_sl = 1;
        $cp_sl = 1;
        $tb_sl = 1;
        $tt_sl = 1;
        $ct_sl = 1;
        $cm_sl = 1;
        $ts_sl = 1;

        foreach (Khaosat::all() as $key => $value) {
            if ($value->trangthai != 0) {
                $value->getdoanhnghiep->huyen == 883 ? ($lx += $value->tongdiem) && ($lx_sl++) : '';
                $value->getdoanhnghiep->huyen == 884 ? ($cd += $value->tongdiem) && ($cd_sl++) : '';
                $value->getdoanhnghiep->huyen == 886 ? ($ap += $value->tongdiem) && ($ap_sl++) : '';
                $value->getdoanhnghiep->huyen == 887 ? ($tc += $value->tongdiem) && ($tc_sl++) : '';
                $value->getdoanhnghiep->huyen == 888 ? ($pt += $value->tongdiem) && ($pt_sl++) : '';
                $value->getdoanhnghiep->huyen == 889 ? ($cp += $value->tongdiem) && ($cp_sl++) : '';
                $value->getdoanhnghiep->huyen == 890 ? ($tb += $value->tongdiem) && ($tb_sl++) : '';
                $value->getdoanhnghiep->huyen == 891 ? ($tt += $value->tongdiem) && ($tt_sl++) : '';
                $value->getdoanhnghiep->huyen == 892 ? ($ct += $value->tongdiem) && ($ct_sl++) : '';
                $value->getdoanhnghiep->huyen == 893 ? ($cm += $value->tongdiem) && ($cm_sl++) : '';
                $value->getdoanhnghiep->huyen == 894 ? ($ts += $value->tongdiem) && ($ts_sl++) : '';
            }
        }

        return [
            'id' => 3,
            'title' => ' Mức độ chuyển đổi số theo Huyện/Thị',
            'colors' => $colors,
            'labels' => $khaosat_huyen_lables,
            'data' => [
                round(($lx / $lx_sl) / 320 * 6, 1),
                round(($cd / $cd_sl) / 320 * 6, 1),
                round(($ap / $ap_sl) / 320 * 6, 1),
                round(($tc / $tc_sl) / 320 * 6, 1),
                round(($pt / $pt_sl) / 320 * 6, 1),
                round(($cp / $cp_sl) / 320 * 6, 1),
                round(($tb / $tb_sl) / 320 * 6, 1),
                round(($tt / $tt_sl) / 320 * 6, 1),
                round(($ct / $ct_sl) / 320 * 6, 1),
                round(($cm / $cm_sl) / 320 * 6, 1),
                round(($ts / $ts_sl) / 320 * 6, 1),
            ],
        ];
    }

    public function phanbokhaosattheonganh()
    { //biểu đồ 4
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
        ];

        $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::all();
        $loaihinh_id = [];
        foreach ($doanhnghiep_loaihinh as $value) {
            $loaihinh_id[$value->id] = 0; // Sửa thành cấu trúc key => value đúng
        }

        foreach (Khaosat::all() as $value) {
            if ($value->trangthai != 0) {
                $doanhnghiep = $value->getdoanhnghiep; // Giả sử đối tượng Khaosat có phương thức getdoanhnghiep
                if ($doanhnghiep) {
                    $doanhnghiep_loaihinh_id = $doanhnghiep->doanhnghiep_loaihinh_id;
                    if (array_key_exists($doanhnghiep_loaihinh_id, $loaihinh_id)) {
                        $loaihinh_id[$doanhnghiep_loaihinh_id]++;
                    }
                }
            }
        }

        arsort($loaihinh_id); // Sắp xếp mảng theo giá trị giảm dần, giữ nguyên key
        $top_10 = array_slice($loaihinh_id, 0, 10, true); // Lấy 10 phần tử đầu tiên, giữ nguyên key

        $sum_top_10 = 0; // Khởi tạo biến tổng

        foreach ($top_10 as $value) {
            $sum_top_10 += $value; // Cộng giá trị của mỗi phần tử vào tổng
        }

        foreach ($top_10 as &$value) {
            $value = round($value * 100 / $sum_top_10, 1); // Chia cho tổng và làm tròn đến 1 chữ số thập phân
        }

        $labels = [];
        foreach ($top_10 as $key => $value) {
            $dn = Doanhnghiep_Loaihinh::find($key);
            $labels[] = $dn->tenloaihinh;
        }

        return [
            'id' => 4,
            'title' => 'Phân bổ doanh nghiệp tham gia khảo sát theo ngành (%)',
            'colors' => $colors,
            'labels' => $labels,
            'data' => array_values($top_10),
        ];
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

        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(15, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
        ];
        $mucdo = [
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
        ];
        $mucdo0 = 0;
        $mucdo1 = 0;
        $mucdo2 = 0;
        $mucdo3 = 0;
        $mucdo4 = 0;
        $mucdo5 = 0;

        foreach (Khaosat::all() as $key => $value) {
            if ($value->trangthai != 0) {
                $value->tongdiem >= 0 && $value->tongdiem <= 20 ? $mucdo0++ : '';
                $value->tongdiem > 20 && $value->tongdiem <= 64 ? $mucdo1++ : '';
                $value->tongdiem > 64 && $value->tongdiem <= 128 ? $mucdo2++ : '';
                $value->tongdiem > 128 && $value->tongdiem <= 192 ? $mucdo3++ : '';
                $value->tongdiem > 192 && $value->tongdiem <= 256 ? $mucdo4++ : '';
                $value->tongdiem > 256 && $value->tongdiem <= 320 ? $mucdo5++ : '';
            }
        }
        return [
            'id' => 6,
            'title' => 'Mức độ chuyển đổi số của doanh nghiệp',
            'colors' => $colors,
            'labels' => $mucdo,
            'data' => [
                $mucdo0,
                $mucdo1,
                $mucdo2,
                $mucdo3,
                $mucdo4,
                $mucdo5,
            ],
        ];
    }

    public function mucdochuyendoisocuadoanhnghiep6phiacanh()
    { //biểu đồ 7
        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)',
        ];
        $trucot = [
            'Trải nghiệm số cho khách hàng', //1
            'Chiến lược số', // 2
            'Hạ tầng và Công nghệ số', // 3
            'Vận hành', // 4
            'Chuyển đổi số văn hóa doanh nghiệp', // 5
            'Dữ liệu và tài sản thông tin', // 6
        ];

        $truccot1 = 0;
        $truccot2 = 0;
        $truccot3 = 0;
        $truccot4 = 0;
        $truccot5 = 0;
        $truccot6 = 0;

        $khaosat_soluong = 0;

        foreach (Khaosat::all() as $key => $value) {
            if ($value->trangthai != 0) {
                $khaosat_soluong++;
                $truccot1 += ($value->getdanhsachphieu1->getketquaphieu1[0]->phantram * 6 * 65 / 100 / 65 * 6);
                $truccot2 += ($value->getdanhsachphieu1->getketquaphieu1[1]->phantram * 6 * 25 / 100 / 25 * 6);
                $truccot3 += ($value->getdanhsachphieu1->getketquaphieu1[2]->phantram * 6 * 80 / 100 / 80 * 6);
                $truccot4 += ($value->getdanhsachphieu1->getketquaphieu1[3]->phantram * 6 * 65 / 100 / 65 * 6);
                $truccot5 += ($value->getdanhsachphieu1->getketquaphieu1[4]->phantram * 6 * 50 / 100 / 50 * 6);
                $truccot6 += ($value->getdanhsachphieu1->getketquaphieu1[5]->phantram * 6 * 35 / 100 / 35 * 6);
            }
        }
        return [
            'id' => 7,
            'title' => 'Mức độ sẵn sàng chuyển đổi số trên 6 phía cạnh của doanh nghiệp tỉnh An Giang',
            'colors' => $colors,
            'labels' => $trucot,
            'data' => [
                round($truccot1 / $khaosat_soluong, 2),
                round($truccot2 / $khaosat_soluong, 2),
                round($truccot3 / $khaosat_soluong, 2),
                round($truccot4 / $khaosat_soluong, 2),
                round($truccot5 / $khaosat_soluong, 2),
                round($truccot6 / $khaosat_soluong, 2)
            ]
        ];
    }

    public function mucdosansangchuyendoisotheonganh()
    { //biểu đồ 8
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
        ];

        $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::all();
        $loaihinh_id = [];
        $loaihinh_soluong = [];
        foreach ($doanhnghiep_loaihinh as $value) {
            $loaihinh_id[$value->id] = 0; // Sửa thành cấu trúc key => value đúng
            $loaihinh_soluong[$value->id] = 0; // Sửa thành cấu trúc key => value đúng
        }

        foreach (Khaosat::all() as $value) {
            if ($value->trangthai != 0) {
                $doanhnghiep = $value->getdoanhnghiep; // Giả sử đối tượng Khaosat có phương thức getdoanhnghiep
                if ($doanhnghiep) {
                    $doanhnghiep_loaihinh_id = $doanhnghiep->doanhnghiep_loaihinh_id;
                    if (array_key_exists($doanhnghiep_loaihinh_id, $loaihinh_id)) {
                        $loaihinh_id[$doanhnghiep_loaihinh_id] += $value->tongdiem / 320;
                        $loaihinh_soluong[$doanhnghiep_loaihinh_id] += 1;
                    }
                }
            }
        }

        arsort($loaihinh_id); // Sắp xếp mảng theo giá trị giảm dần, giữ nguyên key
        $top_10 = array_slice($loaihinh_id, 0, 10, true); // Lấy 10 phần tử đầu tiên, giữ nguyên key

        arsort($loaihinh_soluong);
        $top_10_soluong = array_slice($loaihinh_soluong, 0, 10, true); // Lấy 10 phần tử đầu tiên, giữ nguyên key

        foreach ($top_10 as $key => &$value) {
            $value = round($value / ($top_10_soluong[$key] ?? 1) * 6 , 1); // Chia cho tổng và làm tròn đến 1 chữ số thập phân
        }

        $labels = [];
        foreach ($top_10 as $key => $value) {
            $dn = Doanhnghiep_Loaihinh::find($key);
            $labels[] = $dn->tenloaihinh;
        }

        return [
            'id' => 8,
            'title' => 'Mức độ sẵn sàng chuyển đổi số theo ngành',
            'colors' => $colors,
            'labels' => $labels,
            'data' => array_values($top_10)
        ];
    }

    public function mucdosangsangtheolinhvuc()
    { //biểu đồ 10
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

        $nn_sl = 0;
        $cn_sl = 0;
        $tmdv_sl = 0;
        $kh_sl = 0;

        foreach (Khaosat::all() as $key => $value) {
            $value->getdoanhnghiep->getloaihinh->linhvuc_id == 'nn' ? ($nn += $value->tongdiem) && ($nn_sl++) : '';
            $value->getdoanhnghiep->getloaihinh->linhvuc_id == 'cn' ? ($cn += $value->tongdiem) && ($cn_sl++) : '';
            $value->getdoanhnghiep->getloaihinh->linhvuc_id == 'tmdv' ? ($tmdv += $value->tongdiem) && ($tmdv_sl++) : '';
            $value->getdoanhnghiep->getloaihinh->linhvuc_id == 'kh' ? ($kh += $value->tongdiem) && ($kh_sl++) : '';
        }
        return [
            'id' => 10,
            'title' => 'Mức độ sẵn sàng chuyển đổi số theo lĩnh vực',
            'colors' => $colors,
            'labels' => $linhvuc_lables,
            'data' => [
                round(($nn / $nn_sl) / 320 * 6, 1),
                round(($cn / $cn_sl) / 320 * 6, 1),
                round(($tmdv / $tmdv_sl) / 320 * 6, 1),
                round(($kh / $kh_sl) / 320 * 6, 1),
            ],
        ];
    }
}
