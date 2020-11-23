<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="https://yacenter.org/wp-content/uploads/2016/01/logo_placeholder-300x167.png" alt="Virtual Studios Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://st4.depositphotos.com/4329009/19956/v/1600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Authenticated User' }}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('income.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Income</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('expense.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Expenses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('wish_list.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>Wish List</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            My Account
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage.admins.index') }}" class="nav-link">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('change_password') }}" class="nav-link">
                                <i class="fas fa-user-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link logout-link">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
