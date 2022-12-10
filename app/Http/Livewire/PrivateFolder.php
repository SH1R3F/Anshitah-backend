<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PrivateFolder extends Component
{
    public Folder $folder;
    public function render()
    {
        return view('livewire.private-folder' );
    }
}
