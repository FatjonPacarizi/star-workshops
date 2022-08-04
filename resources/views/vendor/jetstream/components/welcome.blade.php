
<div id="app">
    <aside class="aside is-placed-left is-expanded">
        <div class="aside-tools">
            <div>
                <span class="icon"><i class="mdi mdi-copyright"></i></span>
                Core <sup>UI</sup>
            </div>
        </div>
        <div class="menu is-menu-main">
            <ul class="menu-list">
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon"><i class="mdi mdi-speedometer"></i></span>
                        <span class="menu-item-label">Dashboard</span>
                    </a>
                </li>
            </ul>
            <br>
            <p class="menu-label">System</p>
            <ul class="menu-list">
                <li class="--set-active-tables-html">
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-account-outline"></i></span>
                        <span class="menu-item-label">Access</span>
                        <span class="icon"><i class="mdi mdi-chevron-left"></i></span>
                    </a>
                </li>
                <li class="--set-active-forms-html">
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-format-list-checkbox"></i></span>
                        <span class="menu-item-label">Logs</span>
                        <span class="icon"><i class="mdi mdi-chevron-left"></i></span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
