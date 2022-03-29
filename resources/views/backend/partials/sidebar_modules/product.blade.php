<li class="{{ strpos($routeName, 'backend.admins') === 0 ? 'open active' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-sitemap"></i>
        <span class="menu-text">
                    Admin Management
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">

        <li class="{{ strpos($routeName, 'backend.product.admins') === 0 ? 'open' : ''}}">
            <a href="{{route('backend.admins.index')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                Admin
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
<li class="{{ strpos($routeName, 'backend.admins') === 0 ? 'open active' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-sitemap"></i>
        <span class="menu-text">
                Blood Management
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">

        <li class="{{ strpos($routeName, 'backend.product.admins') === 0 ? 'open' : ''}}">
            <a href="{{route('backend.admins.index')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                Blood Request
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
