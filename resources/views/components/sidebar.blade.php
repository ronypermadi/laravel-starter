<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>

        @foreach($menus as $menu)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $menu->title }}</li>
            @if (!$menu->is_multi)
            <li class="{{ Request::routeIs($menu->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($menu->href) }}"><i class="{{ $menu->icon }}"></i><span>Dashboard</span></a>
            </li>
            @else
                @include('components.sub-menu',['childs' => $menu->childs])
            @endif
        </ul>
        @endforeach
        
    </aside>
</div>
