@if(!isset($permission) || auth()->guard('admin')->user()->canany($permission))
<ul class="vertical-nav-menu">
    <li class="app-sidebar__heading">{{ $name }}</li>
    @foreach ($menuItem as $item)
    @if (count($item['children']) > 0)
    <x-atoms.sidebar.menu-dropdown-item :name="$item['name']" :icon="$item['icon']" :children="$item['children']"
        :permission="$item['permission'] ?? ''">
    </x-atoms.sidebar.menu-dropdown-item>
    @else
    <x-atoms.sidebar.menu-item :name="$item['name']" :href="$item['href']" :permission="$item['permission'] ?? ''">
    </x-atoms.sidebar.menu-item>
    @endif
    @endforeach
</ul>
@endif