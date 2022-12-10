<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <i class="menu-icon flaticon-graphic"></i>
        <span class="menu-text">{{ $title }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">{{ $title }}</span>
                </span>
            </li>
            {{ $slot }}
        </ul>
    </div>
</li><!-- بياناتي -->
