<?php

namespace App\View\Components\atoms\sidebar;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $isActive, $href, $icon, $name;
    public function __construct($isActive, $href, $icon, $name)
    {
        $this->isActive = $isActive;
        $this->href = $href;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.sidebar.menu-item');
    }
}
