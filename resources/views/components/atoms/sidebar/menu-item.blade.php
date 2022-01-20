@if(count($permission) < 1 || auth()->user()->canany($permission))
    <li>
        <a href="{{ $href }}" class="{{ $href == request()->url() ? 'mm-active' : '' }}">
            <i class="metismenu-icon {{ $icon }}"></i>
            {{ $name }}
        </a>
    </li>
    @endif
