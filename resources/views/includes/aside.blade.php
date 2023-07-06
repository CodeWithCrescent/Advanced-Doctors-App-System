      <!-- .app-aside -->
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> 
                <span class="account-summary">
                    <span class="account-name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</span> 
                    <span class="account-description">@if(Auth::user()->role == 0) Admin @elseif(Auth::user()->role == 1) Doctor @else Client @endif</span>
                </span>
            </button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> 
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <span class="dropdown-icon oi oi-account-logout"></span> 
                      Logout
                    </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
              </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header -->
          <!-- .aside-menu -->
          <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
              <ul class="menu">
                <!-- .menu-item -->
                <li class="menu-item {{ (request()->is('admin/dashboard','admin')) ? 'has-active' : '' }} {{ (request()->is('admin/','admin')) ? 'has-active' : '' }}">
                  <a href="{{'dashboard'}}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child {{ (request()->is('admin/add-doctor','admin')) ? 'has-active' : '' }} {{ (request()->is('admin/view-doctors','admin')) ? 'has-active' : '' }}">
                  <a href="#" class="menu-link"><span class="menu-icon fas fa-user-md"></span> <span class="menu-text">Doctors</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item {{ (request()->is('admin/add-doctor','admin')) ? 'has-active' : '' }}">
                      <a href="{{'add-doctor'}}" class="menu-link">Add Doctor</a>
                    </li>
                    <li class="menu-item {{ (request()->is('admin/view-doctors','admin')) ? 'has-active' : '' }}">
                      <a href="{{'view-doctors'}}" class="menu-link">View Doctors</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child {{ (request()->is('admin/add-session','admin')) ? 'has-active' : '' }} {{ (request()->is('admin/view-sessions','admin')) ? 'has-active' : '' }}">
                  <a href="#" class="menu-link"><span class="menu-icon fas fa-user-md"></span> <span class="menu-text">Sessions</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item {{ (request()->is('admin/add-session','admin')) ? 'has-active' : '' }}">
                      <a href="{{'add-session'}}" class="menu-link">Add Session</a>
                    </li>
                    <li class="menu-item {{ (request()->is('admin/view-sessions','admin')) ? 'has-active' : '' }}">
                      <a href="{{'view-sessions'}}" class="menu-link">View Sessions</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item {{ (request()->is('admin/view-appointments','admin')) ? 'has-active' : '' }}">
                  <a href="{{'view-appointments'}}" class="menu-link"><span class="menu-icon fas fa-calendar"></span> <span class="menu-text">Appointments</span> <span class="badge badge-warning">New</span></a> <!-- child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item {{ (request()->is('admin/settings','admin')) ? 'has-active' : '' }}">
                  <a href="{{'settings'}}" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Settings</span></a>
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item {{ (request()->is('admin/clients','admin')) ? 'has-active' : '' }}">
                  <a href="{{'clients'}}" class="menu-link"><span class="menu-icon fas fa-user"></span> <span class="menu-text">Clients</span></a>
                </li><!-- /.menu-item -->

                <!-- .menu-header -->
                <!-- <li class="menu-header">Interfaces </li>/.menu-header -->

              </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
          </div><!-- /.aside-menu -->
          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
          </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
      </aside><!-- /.app-aside -->