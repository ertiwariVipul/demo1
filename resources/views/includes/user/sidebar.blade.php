<!-- Left Sidebar End -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                {{-- <li>
                    <a href="{{ route('user.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Dashboard</span>
                    </a>
                </li> --}}
               <li>
                    <a href="{{route('user.event')}}" class="waves-effect">
                        <i class="bx bx-calendar"></i><span>My Events</span>
                    </a>    
                </li>

               <li>
                    <a href="" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Setting</span>
                    </a>    
                </li>
                {{-- <li>
                    <a href="{{ route('user.setting.category') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Settings</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                        <li><a href="{{ route('user.setting.category') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span>category</span>
                        </a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('user.logout') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span>Logout</span>
                    </a>
                </li> 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
