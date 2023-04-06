<!-- Left Sidebar End -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.event') }}" class="waves-effect">
                        <i class="bx bx-calendar"></i><span>Events</span>
                    </a>    
                </li>
                <li>
                    <a href="{{ route('admin.model') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Model</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profilelevel') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Settings</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                    
                        <li><a href="{{ route('admin.profilelevel') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span>Profile Level</span>
                        </a></li>
                        <li><a href="{{ route('admin.setting.category') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span>category</span>
                        </a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
