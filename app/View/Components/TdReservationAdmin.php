<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class TdReservationAdmin extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $seance;
    public $users;
    public function __construct($seance)
    {
        $this->seance = $seance;
        $this->users  = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.td-reservation-admin');
    }
}
