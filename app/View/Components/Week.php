<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Week extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $status;
    public $date;
    public function __construct($id,$name,$status,$date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.week');
    }
}
