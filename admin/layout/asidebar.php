
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('Tamplate/dist/img/pstufavicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PSTU ATUMATION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active': '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teacher</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Din</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Provost</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Doctor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>libraryan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Security Guard</p>
                  </a>
                </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Appoinments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a x-ref="profileLink" href="{{-- {{ route('admin.profile.edit') }} --}}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <form method="POST" action="{{-- {{ route('logout') }} --}}">
              @csrf
              <a href="{{-- {{ route('logout') }} --}}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </form>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ request()->is('admin/home') ? 'active': '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Websiste
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('admin/home') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{-- {{ route('admin.user') }} --}}" class="nav-link {{ request()->is('admin/user') ? 'active': '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact</p>
                  </a>
                </li>
            </ul>
          </li>
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>