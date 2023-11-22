<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/show-registered-data" class="nav-link">User</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('show-virtual-event') }}" class="nav-link">Virtual Meeting</a>
      </li>
    </ul>

    <!-- Right navbar links -->
<ul class="nav navbar-nav ml-auto">
  @auth
      <a href="#" class="dropdown-toggle home" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-user-md" aria-hidden="true" style="color: blue;font-size: 17px;">
              {{ Auth::user()->lname.' '.Auth::user()->fname }}
              <span class="caret"></span>
          </i>
      </a>
      <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <li>
              <a class="dropdown-item" href="{{ route('home') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: red;font-size: 15px">
                  <span class="glyphicon glyphicon-log-out" style="color: red">
                      <i class="fas fa-sign-out-alt"> Logout</i>
                  </span> 
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  {{ csrf_field() }}
              </form>
          </li>
      </ul>
  @endauth
</ul>

  </nav>
  <!-- /.navbar -->


    {{-- <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Virtual Meeting
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="nav-icon ion ion-person"></i>
                <p>
                  User
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside> --}}
  