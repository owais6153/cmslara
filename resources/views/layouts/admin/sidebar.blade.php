        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ ($globalsettings->getValue( 'site_name')) ? $globalsettings->getValue('site_name') : config('app.name', 'Laravel') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{(request()->is('admin')) ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">




             @if (Bouncer::can('viewUsers') || Bouncer::can('addUsers') || Bouncer::can('viewRoles') || Bouncer::can('addRoles') )
            <!-- Heading -->
            <div class="sidebar-heading">
                Users & Roles
            </div>
             <!-- Nav Item - Pages Collapse Menu -->
             @if (Bouncer::can('viewUsers') || Bouncer::can('addUsers') )
            <li class="nav-item {{(request()->is('admin/users/*') || request()->is('admin/users') ) ? 'active' : ''}}">
                <a class="nav-link {{(request()->is('admin/users/*') || request()->is('admin/users') ) ? '' : 'collapsed'}} " href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse {{(request()->is('admin/users/*') || request()->is('admin/users') ) ? 'show' : ''}}" aria-labelledby="All Users" data-parent="#accordionSidebar">
                    <div class="bg-primary py-2 collapse-inner rounded">
                        @can('viewUsers')
                        <a class="collapse-item text-light" href="{{route('users')}}">All Users</a>
                        @endcan
                        @can('addUsers')
                        <a class="collapse-item text-light" href="{{route('users.add')}}">Add Users</a>
                        @endcan
                    </div>
                </div>
            </li>
            @endif
            @if ( Bouncer::can('viewRoles') || Bouncer::can('addRoles') )
            <li class="nav-item {{(request()->is('admin/roles/*') || request()->is('admin/roles') ) ? 'active' : ''}}">
                <a class="nav-link {{(request()->is('admin/roles/*') || request()->is('admin/roles') ) ? '' : 'collapsed'}} " href="#" data-toggle="collapse" data-target="#roles"
                    aria-expanded="true" aria-controls="roles">
                    <i class="fas fa-users"></i>
                    <span>Roles</span>
                </a>
                <div id="roles" class="collapse {{(request()->is('admin/roles/*') || request()->is('admin/roles') ) ? 'show' : ''}}" aria-labelledby="All Users" data-parent="#accordionSidebar">
                    <div class="bg-primary py-2 collapse-inner rounded">
                        @can('viewRoles')
                        <a class="collapse-item text-light" href="{{route('roles')}}">All Roles</a>
                        @endcan
                        @can('addRoles')
                        <a class="collapse-item text-light" href="{{route('roles.add')}}">Add Roles</a>
                        @endcan
                    </div>
                </div>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider">
            @endif
            @can('accessSettings')
            <!-- Heading -->
            <div class="sidebar-heading">
                Site Settings
            </div>
            <li class="nav-item {{(request()->is('admin/settings')) ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('settings', ['type' => 'general']) }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span></a>
            </li><!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            @endcan


            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>