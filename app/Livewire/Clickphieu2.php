<?php

namespace App\Livewire;

use App\Models\Danhgiaphieu2;
use App\Models\Danhsachphieu2;
use Livewire\Component;

class Clickphieu2 extends Component
{
    public function render()
    {
        // dump($this->id);
        return view('livewire.clickphieu2');
    }
    public $id, $giatri, $diem, $trangthai;
    public function mount($id, $giatri, $diem, $trangthai)
    {
        $this->id = $id;
        $this->giatri = $giatri;
        $this->diem = $diem;
        $this->trangthai = $trangthai;
    }
    public function click2($diem_update)
    {
        $danhgiaphieu2 = Danhgiaphieu2::find($this->id);
        $danhgiaphieu2->update([
            'diem' => $diem_update,
            'trangthai' => 1,
        ]);

        $soluonghoanthanh = 0;
        $tongdiem = 0;
        $danhgiaphieu2_tatca = Danhgiaphieu2::where('danhsachphieu2_id', $danhgiaphieu2->danhsachphieu2_id)->get();

        // dump($danhgiaphieu1_tatca);
        foreach ($danhgiaphieu2_tatca as $item) {
            if ($item->trangthai == 1) {
                $tongdiem += $item->diem;
                $soluonghoanthanh++;
            }
        }
        $danhsachphieu1 = Danhsachphieu2::find($danhgiaphieu2->getdanhsachphieu2->id);
        $danhsachphieu1->update([
            'diem' => $tongdiem,
            'soluonghoanthanh' => $soluonghoanthanh,
            'trangthai' => $soluonghoanthanh == 29 ? 1 : 0
        ]);

    }
}
