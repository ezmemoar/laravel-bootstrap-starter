<?php

namespace App\View\Components\molecules\sidebar;

use Illuminate\View\Component;

class MenuList extends Component
{
    public $name;
    protected $menuItem;

    public function __construct($name, $menuItem)
    {
        $this->name = $name;
        $this->menuItem = $menuItem;
    }

    public function render()
    {
        return view('components.molecules.sidebar.menu-list');
    }
}
