<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment($count)
    {
        // dump($this->count);

        $this->count = $count + 1;
    }

    public function render()
    {
        return view('livewire.counter', ['count' => $this->count]);
    }
}
