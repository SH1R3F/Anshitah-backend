<?php

namespace App\Http\Livewire;

use App\Models\Shared;
use Livewire\Component;

class SharedFolders extends Component
{
    public function render()
    {
        $shareds = Shared::where('shared_id',NULL)->get(); // المجلدات المشتركة
        return view('livewire.shared-folders' , compact('shareds'));
    }
}
