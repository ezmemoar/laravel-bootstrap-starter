@if($permission == false || auth()->user()->canany($permission))
<li>
    <a href="#">
        <i class="metismenu-icon {{ $icon ?? '' ? $icon : 'pe-7s-rocket' }}"></i>
        {{ $name }}
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        @foreach ($children as $child)
        @if(!isset($child['permission']) || $child['permission'] == false || auth()->user()->canany($child['permission']))
        <li>
            <a href="{{ $child['href'] }}">
                <i class="metismenu-icon"></i>
                {{ $child['name'] }}
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</li>
@endif