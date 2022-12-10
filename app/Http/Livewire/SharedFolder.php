<?php

namespace App\Http\Livewire;

use App\Models\Shared;
use Livewire\Component;

class SharedFolder extends Component
{
    public Shared $shared;
    public function render()
    {
        return view('livewire.shared-folder');
    }
}
