<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoBoxList extends Component
{
    public $listName;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($listName='')
    {
        //
        $this->listName = $listName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.info-box-list');
    }
}
