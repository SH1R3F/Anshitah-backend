<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PrivateFolders extends Component
{
    public function render()
    {
        $folders = Folder::where('user_id', Auth::user()->id)
            ->where('folder_id', NULL)
            ->where('status', 0)
            ->get(); //المجلدات غير المشتركة
        return view('livewire.private-folders' , compact('folders'));
    }
}
