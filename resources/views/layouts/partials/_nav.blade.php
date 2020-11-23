<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="https://st4.depositphotos.com/4329009/19956/v/1600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" class="img-circle elevation-2" alt="User Image" width="20">
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-user-check mr-2"></i>
                {{ __('Profile') }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('change_password') }}" class="dropdown-item">
                <i class="fas fa-user-lock  mr-2"></i>
                {{ __('Change Password') }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item logout-link">
                <i class="fas fa-sign-out-alt mr-2"></i>
                {{ __('Logout') }}
            </a>
        </div>
      </li>
    </ul>
</nav>
