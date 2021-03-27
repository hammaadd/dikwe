<?php

namespace App\View\Components;

use Illuminate\View\Component;

class myTagsList extends Component
{
    public $tagname;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tagname='')
    {
        //
        $this->tagname = $tagname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.my-tags-list');
    }
}
