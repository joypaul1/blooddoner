<li class="{{ strpos($routeName, 'backend.order') === 0 ? 'active open' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-shopping-cart"></i>
        <span class="menu-text">
                   Order
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.order.index' ? 'open' : ''}}">
            <a href="{{ route('backend.order.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Orders
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
    <ul class="submenu">
        <li class="{{ $routeName === 'backend.order.delivery' ? 'open' : ''}}">
            <a href="{{ route('backend.order.delivery') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Deliveries
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
