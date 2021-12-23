<ul class="vertical-nav-menu">
    <li class="app-sidebar__heading">{{ $name }}</li>
    @foreach ($menuItem as $item)
    @if (count($item['children']) > 0)
    <x-atoms.sidebar.menu-dropdown-item :name="$item['name']" :icon="$item['icon']" :children="$item['children']">
    </x-atoms.sidebar.menu-dropdown-item>
    @else
    <x-atoms.sidebar.menu-item :name="$item['name']" :href="$item['href']"></x-atoms.sidebar.menu-item>
    @endif
    @endforeach
</ul>