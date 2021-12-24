<?php

namespace App\View\Components\atoms\sidebar;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $isActive, $href, $icon, $name, $permission;
    public function __construct($isActive, $href, $icon, $name, $permission)
    {
        $this->isActive = $isActive;
        $this->href = $href;
        $this->icon = $icon;
        $this->name = $name;
        $this->permission = $permission;
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
