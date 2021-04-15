<?php

namespace App\View\Components;

use Illuminate\View\Component;

class workspacesList extends Component
{
    public $wsparent, $wschild, $wssubchild;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($wsparent='',$wschild='',$wssubchild='')
    {
        //
        $this->wsparent = $wsparent;
        $this->wschild = $wschild;
        $this->wssubchild = $wssubchild;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.workspaces-list');
    }
}
