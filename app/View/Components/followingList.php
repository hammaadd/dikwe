<?php

namespace App\View\Components;

use Illuminate\View\Component;

class followingList extends Component
{
    public $followname, $followcount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($followname='', $followcount='')
    {
        //
        $this->followname = $followname;
        $this->followcount = $followcount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.following-list');
    }
}
