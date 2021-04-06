@php
    $routes = collect($menu->childs)->map(function ($child) {
        return Request::routeIs($child->href);
    })->toArray();

    $is_active = in_array(true, $routes);
@endphp
<li class="dropdown {{ ($is_active) ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $menu->icon }}"></i> <span>{{ $menu->title }}</span></a>
    <ul class="dropdown-menu">
        @foreach ($menu->childs as $child)
            <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
        @endforeach
        
    </ul>
</li>