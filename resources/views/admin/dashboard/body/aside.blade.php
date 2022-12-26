@php
    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();
@endphp
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Wallet</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ $route == 'admin_dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ $route == 'admin_user_data' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_user_data') }}">
            <i class="fa-solid fa-user"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item {{ $route == 'admin_total_supply' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_total_supply') }}">
            <i class="fa-solid fa-money-bill-trend-up"></i>
            <span>Total Supply</span></a>
    </li>
    <li class="nav-item {{ $route == 'admin_transaction_view' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_transaction_view') }}">
            <i class="fa-solid fa-paper-plane"></i>
            <span>Transactions</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>
</ul>
