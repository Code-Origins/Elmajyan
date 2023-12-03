<aside class="main-sidebar-admin">
    <div class="sidebar-admin">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column pt-4" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu">
                    <a href="{{ route('sliders.index') }}" class="nav-link">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
                            <path d="M11,1v6H1v42h38v-6h10V8.586L41.414,1H11z M42,4.414L45.586,8H42V4.414z M37,47H3V9h8h19v7h7v27V47z M32,10.414L35.586,14 H32V10.414z M39,41V14.586L31.414,7H13V3h27v7h7v31H39z" />
                        </svg>
                        <span>Sliders</span>
                    </a>
                    <div class="subMenu">
                        <a href="{{ route('sliders.index') }}" class="nav-link"><span>All sliders</span></a>
                        <a href="{{ route('sliders.create') }}" class="nav-link"><span>Add New</span></a>
                    </div>
                </li>
                <li class="nav-item menu">
                    <a href="{{ route('settings.general') }}" class="nav-link"><i
                            class="nav-icon fas fa-sliders-h"></i><span>Settings</span></a>
                    <div class="subMenu">
                        <a href="{{ route('settings.general') }}" class="nav-link"><span>General</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
