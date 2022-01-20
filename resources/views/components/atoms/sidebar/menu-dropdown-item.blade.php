@if(count($permission) < 1 || auth()->user()->canany($permission))
    <li class="{{ $isHaveSameLink ? 'mm-active' : '' }}">
        <a href="#" class="{{ $isHaveSameLink ? 'mm-active' : '' }}">
            <i class="metismenu-icon {{ $icon }}"></i>
            {{ $name }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul class="{{ $isHaveSameLink ? 'mm-show' : '' }}">
            @foreach ($children as $child)
            @if(!isset($child['permission']) || count($child['permission']) < 1 || auth()->
                user()->canany($child['permission']))
                <li>
                    <a href="{{ $child['href'] }}" class="{{ $child['href'] == request()->url() ? 'mm-active' : '' }}">
                        <i class="metismenu-icon"></i>
                        {{ $child['name'] }}
                    </a>
                </li>
                @endif
                @endforeach
        </ul>
    </li>
    @endif