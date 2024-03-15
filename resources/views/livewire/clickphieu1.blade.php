<div class="py-5">
    @for ($i = 0; $i <= 5; $i++)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions{{ $id }}"
                id="inlineRadio{{ $id }}" @if ($trangthai == 1 && $diem == $i) checked @endif
                wire:click ="click1({{ $i }})" value="{{ $i }}">
            <label class="form-check-label" for="inlineRadio{{ $id }}">{{ $i }}</label>
        </div>
    @endfor
</div>
