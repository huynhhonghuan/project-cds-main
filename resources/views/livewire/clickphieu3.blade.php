<div>
    <div class="form-check text-center">
        <input class="form-check-input" type="radio" name="inlineRadioOptions{{ $id }}"
            id="inlineRadio{{ $id }}" @if ($trangthai == 1 && $diem == $giatri) checked @endif
            wire:click ="click3({{ $giatri }})" value="">
    </div>
</div>
