<?php

namespace App\View\Components\atoms\sidebar;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $name, $href, $icon, $permission;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $href, string $icon = 'pe-7s-rocket', array $permission = [])
    {
        $this->name = $name;
        $this->href = $href;
        $this->icon = $icon;
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
