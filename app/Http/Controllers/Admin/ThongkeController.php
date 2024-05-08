<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use App\Models\Mohinh_Trucot;
use App\Models\Mucdo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ThongkeController extends Controller
{
    public function test()
    {
        return view('trangquanly.admin.thongke.test');
    }
    public function doanhnghiep()
    {
        $tendanhsach = 'Danh sách thống kê của doanh nghiệp';
        $danhsach  = Doanhnghiep::with('getkhaosat')->get();
        return view('trangquanly.admin.thongke.doanhnghiep', compact('danhsach', 'tendanhsach'));
    }

    public function doanhnghiep_bieudo(Request $request)
    {
        $user = User::find($request->id);
        $khaosat1 = $user->getdoanhnghiep->getkhaosat;
        //Biểu đồ tròn
        $trucot1 = Mohinh_Trucot::all();
        $trucot_labels = $trucot1->pluck('tentrucot');

        //Biểu đồ đường
        $mucdo1 = Mucdo::all();
        $mucdo_labels = $mucdo1->pluck('tenmucdo');
        $mucdo_labels->prepend('Chưa bắt đầu');

        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)'
        ];

        $trucot = [];
        $mucdo = [];
        $khaosat = [];

        foreach ($khaosat1 as $key => $it) {
            // lấy giá trị trụ cột
            if ($it->getdanhsachphieu1->getketquaphieu1[0])
                $trucot = [
                    $it->getdanhsachphieu1->getketquaphieu1[0]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[1]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[2]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[3]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[4]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[5]->phantram,
                ];
            //tính toán giá trị mức độ
            if ($it->trangthai != 0) {
                $it->tongdiem == 0 ? $mucdo = [0] : '';
                ($it->tongdiem > 0 && $it->tongdiem <= 64) ? $mucdo = [0, $it->tongdiem] : '';
                ($it->tongdiem > 64 && $it->tongdiem <= 128) ? $mucdo = [0, 64, $it->tongdiem] : '';
                ($it->tongdiem > 128 && $it->tongdiem <= 192) ? $mucdo = [0, 64, 128, $it->tongdiem] : '';
                ($it->tongdiem > 192 && $it->tongdiem <= 256) ? $mucdo = [0, 64, 128, 192, $it->tongdiem] : '';
                ($it->tongdiem == 320) ? $mucdo = [0, 64, 128, 192, 256, 320] : '';
            }
            $khaosat[] = [
                'id' => $it->id,
                'tendoanhnghiep' =>  $user->getdoanhnghiep->tentiengviet ?? 'doanhnghiep',
                'lan' => $key + 1,
                'trangthai' => $it->trangthai,
                'tongdiem' => $it->tongdiem,
                'soluongdanhgia' => count($it->getdanhgia),
                'colors' => $colors,
                'trucot_labels' => $trucot_labels,
                'trucot' => $trucot,
                'mucdo_labels' => $mucdo_labels,
                'mucdo' => $mucdo,
            ];
            $trucot = [];
            $mucdo = [];
        }
        return response()->json($khaosat);
    }

    public function mucdobieudo(Request $request)
    {
        // $ngaydb = null;
        // $ngaygiua = null;
        // $ngaykt = null;
        $ngaybd =  $request->nam . '-' . $request->quy . '-01';
        $ngaygiua = $request->nam . '-' . ($request->quy + 1) . '-01';
        $ngaykt = $request->nam . '-' . ($request->quy + 2) . '-01';

        $khaosat_labels = [$ngaybd, $ngaygiua, $ngaykt];
        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        // foreach (Khaosat::all() as $item) {
        //     $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'nn' ? $kh_nn++ : '';
        //     $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'cn' ? $kh_cn++ : '';
        //     $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'tmdv' ? $kh_tmdv++ : '';
        //     $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'kh' ? $kh_kh++ : '';
        // }

        $mucdo = [
            'id' => 1,
            'title' => 'Mức độ chuyển đổi số doanh nghiêp quý 1 năm 2024',
            'labels' => $khaosat_labels,
            'datasets' => [
                [
                    'label' => 'Nông nghiệp',
                    'data' => [10, 20, 30],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
                [
                    'label' => 'Công nghiệp',
                    'data' => [15, 25, 35],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Thương mại và dịch vụ',
                    'data' => [20, 30, 40],
                    'backgroundColor' => 'rgba(105, 206, 86, 0.2)',
                ],
                [
                    'label' => 'Khác',
                    'data' => [20, 30, 40],
                    'backgroundColor' => 'rgba(225, 156, 86, 0.5)',
                ],

            ],
        ];
        return response()->json($mucdo);
    }
    public function luubieudocot(Request $request)
    {
        // Lưu hình ảnh vào storage của Laravel
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageName = 'bieu-do-muc-do-khao-sat.png'; // Tên hình ảnh
        Storage::disk('public')->put($imageName, base64_decode($imageData));

        // Trả về đường dẫn đến hình ảnh đã lưu
        return response()->json(['imagePath' => $imageName]);
    }
    public function xuatbieudocot(Request $request)
    {
        // Lấy đường dẫn hình ảnh từ yêu cầu
        $imagePath = $request->input('image');

        // Tạo một Spreadsheet mới
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        // Chèn hình ảnh vào file Excel
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Chart');
        $drawing->setDescription('Chart');
        $drawing->setPath(storage_path('app/public/' . $imagePath)); // Đường dẫn đến hình ảnh
        $drawing->setCoordinates('D1');
        $drawing->setWidth(500); // Độ rộng
        $drawing->setHeight(500); // Độ cao
        $drawing->setWorksheet($worksheet);

        // Xuất dữ liệu từ cơ sở dữ liệu
        $users = User::all(); // Assumed model name is User
        $row = 2; // Dòng bắt đầu ghi dữ liệu

        foreach ($users as $user) {
            $worksheet->setCellValue('A' . $row, $user->name);
            $worksheet->setCellValue('B' . $row, $user->email);
            // Ghi thêm dữ liệu khác nếu cần
            $row++;
        }

        // Lưu file Excel
        $filename = 'example.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('app/public/' . $filename));

        // Trả về file Excel để tải về
        return response()->download(storage_path('app/public/' . $filename))->deleteFileAfterSend(true);
    }

    public function doanhnghiepxuatbieudo(Request $request)
    {
        // dd($request);
        // Lấy đường dẫn hình ảnh từ yêu cầu
        $imagePath = $request->input('image');

        // Tạo một Spreadsheet mới
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setTitle('thongke'); // Đặt tên cho sheet

        // Chèn hình ảnh vào file Excel
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Chart');
        $drawing->setDescription('Chart');
        $drawing->setPath(storage_path('app/public/' . $imagePath)); // Đường dẫn đến hình ảnh
        $drawing->setCoordinates('D1');
        $drawing->setWidth(500); // Độ rộng
        $drawing->setHeight(500); // Độ cao
        $drawing->setWorksheet($worksheet);

        // Xuất dữ liệu từ cơ sở dữ liệu
        // $users = User::all(); // Assumed model name is User
        $row = 2; // Dòng bắt đầu ghi dữ liệu

        $dataArray = explode(',', $request->input('labels'));

        $worksheet->setCellValue('A' . 1, 'Tên trụ cột');
        foreach ($dataArray as $it) {
            $worksheet->setCellValue('A' . $row, $it);
            // Ghi thêm dữ liệu khác nếu cần
            $row++;
        }

        $row = 2; // Dòng bắt đầu ghi dữ liệu
        $dataArray1 = explode(',', $request->input('data'));
        $worksheet->setCellValue('B' . 1, 'Điểm');
        foreach ($dataArray1 as $it) {
            $worksheet->setCellValue('B' . $row, $it);
            // Ghi thêm dữ liệu khác nếu cần
            $row++;
        }

        // Lưu file Excel
        $filename = $request->input('tendoanhnghiep') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('app/public/' . $filename));

        // Trả về file Excel để tải về
        return response()->download(storage_path('app/public/' . $filename))->deleteFileAfterSend(true);
    }
}
