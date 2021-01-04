<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profileLayout extends Component
{
    public $user;
    public $tab;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tab, $user)
    {
        $this->tab = $tab;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.profile-layout');
    }
}
