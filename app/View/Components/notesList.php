<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notesList extends Component
{
    public $notename;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($notename='')
    {
        //
        $this->notename = $notename;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notes-list');
    }
}
