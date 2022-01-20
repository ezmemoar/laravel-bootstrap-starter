<?php

namespace App\View\Components\atoms\sidebar;

use Illuminate\View\Component;

class MenuDropdownItem extends Component
{
    public $name, $children, $icon, $isActive, $permission;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, array $children, string $icon = 'pe-7s-rocket', bool $isActive = false, array $permission = [])
    {
        $this->name = $name;
        $this->children = $children;
        $this->icon = $icon;
        $this->isActive = $isActive;
        $this->permission = $permission;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $childrenLinks = array_column($this->children, 'href');
        $isHaveSameLink = in_array(request()->url(), $childrenLinks);
        return view('components.atoms.sidebar.menu-dropdown-item', compact('isHaveSameLink'));
    }
}
