<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userProfile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $countries;
    public function __construct($countries)
    {
        //
        $this->countries = $countries;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-profile');
    }
}
