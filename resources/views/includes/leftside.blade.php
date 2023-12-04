
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar mt-4">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-original-title="test" data-target="#smallModal">
                        <i class="far fa-circle nav-icon"></i>
                        <p>CSV import</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('export') }}" class="nav-link {{ (request()->routeIs('export*'))  ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>CSV export</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->routeIs('home*'))  ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Today's currency rate</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('commission_rate') }}" class="nav-link {{ (request()->routeIs('commission_rate*'))  ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Commission rate</p>
                    </a>
                </li>
				<li class="nav-item">
                    <a href="{{ route('doct') }}" class="nav-link {{ (request()->routeIs('doct*'))  ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project documentation</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
