<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TdReservation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $seance;

    public function __construct($seance)
    {
        $this->seance = $seance;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.td-reservation');
    }
}
