<li class="{{ strpos($routeName, 'backend.purchase.') === 0 ? 'open active' : ''}}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-shopping-bag"></i>
        <span class="menu-text">
                    Purchase
        </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ strpos($routeName, 'backend.purchase.purchases') === 0 ? 'open' : ''}}">
            <a href="{{route('backend.purchase.purchases.index')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                Purchases
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ strpos($routeName, 'backend.purchase.sources') === 0 ? 'open' : ''}}">
            <a href="{{route('backend.purchase.sources.index')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                Sources
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>
