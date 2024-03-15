<?php

namespace App\Livewire;

use App\Models\Danhgiaphieu3;
use App\Models\Danhsachphieu3;
use Livewire\Component;

class Clickphieu3 extends Component
{
    public function render()
    {
        return view('livewire.clickphieu3');
    }
    public $id, $giatri, $diem, $trangthai;
    public function mount($id, $giatri, $diem, $trangthai)
    {
        $this->id = $id;
        $this->giatri = $giatri;
        $this->diem = $diem;
        $this->trangthai = $trangthai;
    }
    public function click3($diem_update)
    {
        $danhgiaphieu3 = Danhgiaphieu3::find($this->id);
        $danhgiaphieu3->update([
            'diem' => $diem_update,
            'trangthai' => 1,
        ]);

        $soluonghoanthanh = 0;
        $tongdiem = 0;
        $danhgiaphieu3_tatca = Danhgiaphieu3::where('danhsachphieu3_id', $danhgiaphieu3->danhsachphieu3_id)->get();

        // dump($danhgiaphieu1_tatca);
        foreach ($danhgiaphieu3_tatca as $item) {
            if ($item->trangthai == 1) {
                $tongdiem += $item->diem;
                $soluonghoanthanh++;
            }
        }
        $danhsachphieu1 = Danhsachphieu3::find($danhgiaphieu3->getdanhsachphieu3->id);
        $danhsachphieu1->update([
            'diem' => $tongdiem,
            'soluonghoanthanh' => $soluonghoanthanh,
            'trangthai' => $soluonghoanthanh == 9 ? 1 : 0
        ]);
    }
}
