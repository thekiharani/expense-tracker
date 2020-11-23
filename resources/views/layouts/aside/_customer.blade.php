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
                <img src="https://toppng.com/uploads/preview/roger-berry-avatar-placeholder-11562991561rbrfzlng6h.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Authenticated User' }}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.bookings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Bookings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Bulk Prints</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-crop-alt"></i>
                        <p>Frame Prints</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>Transactions</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
