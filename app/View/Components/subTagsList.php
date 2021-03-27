<?php

namespace App\View\Components;

use Illuminate\View\Component;

class subTagsList extends Component
{
    public $subtagname;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subtagname='')
    {
        //
        $this->subtagname = $subtagname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sub-tags-list');
    }
}
