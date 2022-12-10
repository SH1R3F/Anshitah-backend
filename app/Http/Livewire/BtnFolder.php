<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnFolder extends Component
{
    public $title;
    public $subtitle;
    public $route;
    public $color;
    public function render()
    {
        return view('livewire.btn-folder');
    }
}
