<?php

namespace App\Livewire;

use App\Models\Danhgiaphieu1;
use App\Models\Danhsachphieu1;
use App\Models\Khaosat;
use Livewire\Component;

class Clickphieu1Chienluoc extends Component
{
    public function render()
    {
        return view('livewire.clickphieu1-chienluoc');
    }
    public $id, $diem, $trangthai;
    public function mount($id, $diem, $trangthai)
    {
        $this->id = $id;
        $this->diem = $diem;
        $this->trangthai = $trangthai;
    }
    public function click1_chienluoc($diem_update)
    {
        $danhgiaphieu1 = Danhgiaphieu1::find($this->id);
        $danhgiaphieu1->update([
            'diem' => $diem_update,
            'trangthai' => 1,
        ]);
        $soluonghoanthanh = 0;
        $tongdiem = 0;
        $danhgiaphieu1_tatca = Danhgiaphieu1::where('danhsachphieu1_id', $danhgiaphieu1->danhsachphieu1_id)->get();

        // dump($danhgiaphieu1_tatca);
        foreach ($danhgiaphieu1_tatca as $item) {
            if ($item->trangthai == 1) {
                $tongdiem += $item->diem;
                $soluonghoanthanh++;
            }
        }
        $danhsachphieu1 = Danhsachphieu1::find($danhgiaphieu1->getdanhsachphieu1->id);
        $danhsachphieu1->update([
            'diem' => $tongdiem,
            'soluonghoanthanh' => $soluonghoanthanh,
            'trangthai' => $soluonghoanthanh == 60 ? 1 : 0
        ]);

        $khaosat = Khaosat::find($danhgiaphieu1->getdanhsachphieu1->getkhaosat->id);
        $khaosat->update([
            'tongdiem' => $tongdiem,
        ]);

        //cập nhật kết quả phiếu 1 (phần trăm cho 5 trụ cột, ngoài trụ cột số 2: chiến lược)
        $ketquaphieu1 = $danhgiaphieu1->getdanhsachphieu1->getketquaphieu1;
        foreach ($ketquaphieu1 as $item1) {
            $diem = 0;
            $soluongcauhoi = 0;

            foreach ($danhgiaphieu1_tatca as $item2) {
                if ($item1->mohinh_trucot_id == $item2->getcauhoiphieu1->getmohinhtrucot->id) {
                    $diem += $item2->diem;
                    $soluongcauhoi++;
                }
            }
            $item1->update([
                'phantram' => round(($diem / ($soluongcauhoi * 25)) / 6, 2),
            ]);
        }
        // dump($ketquaphieu1);
    }
}
