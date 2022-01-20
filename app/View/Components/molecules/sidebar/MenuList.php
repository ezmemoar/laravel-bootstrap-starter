<?php

namespace App\View\Components\molecules\sidebar;

use Illuminate\View\Component;

class MenuList extends Component
{
    public $name, $menuItem, $permission;

    public function __construct($name, $menuItem, $permission = [])
    {
        $this->name = $name;
        $this->menuItem = $menuItem;
        $this->permission = $permission;
    }

    public function render()
    {
        return view('components.molecules.sidebar.menu-list');
    }
}
