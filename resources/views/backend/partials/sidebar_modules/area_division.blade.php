<li class="{{ strpos($routeName, 'backend.area') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-user-md"></i>
        <span class="menu-text">
           Area Division
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.area' ? 'open' : ''}}">
            <a href="{{ route('backend.area.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Division
            </a>
            <b class="arrow"></b>
        </li>
         <li class="{{ $routeName === 'backend.area.city' ? 'open' : ''}}">
            <a href="{{ route('backend.area.city.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                 City
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ $routeName === 'backend.post_code' ? 'open' : ''}}"">
            <a href="{{ route('backend.area.post_code.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Area
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
