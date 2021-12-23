<li>
    <a href="{{ $href }}" class="{{ $isActive ?? '' ? 'mm-active' : '' }}">
        <i class="metismenu-icon {{ $icon ?? '' ? $icon : 'pe-7s-rocket' }}"></i>
        {{ $name }}
    </a>
</li>