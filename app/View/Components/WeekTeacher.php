<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WeekTeacher extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $days;
    public function __construct($id,$name,$days)
    {
        $this->id = $id;
        $this->name = $name;
        $this->days = $days;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.week-teacher');
    }
}
