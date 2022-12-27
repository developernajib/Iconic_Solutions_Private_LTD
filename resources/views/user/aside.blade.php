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
    <li class="nav-item {{ $route == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ $route == 'user_transaction_view' || 'user_transaction_create' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('user_transaction_view') }}" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-solid fa-paper-plane"></i>
            <span>Transactions</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaction:</h6>
                <a class="collapse-item {{ $route == 'user_transaction_view' ? 'active' : '' }}"
                    href="{{ route('user_transaction_view') }}">View</a>
                <a class="collapse-item {{ $route == 'user_transaction_create' ? 'active' : '' }}"
                    href="{{ route('user_transaction_create') }}">Create</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Wallet Actions:</h6>
                <form action="{{ route('user_wallet_store') }}" method="post">
                    @csrf
                    <button type="submit" class="collapse-item"
                        title="Don't click if you don't want create a wallet">Create Wallet</button>
                </form>
                {{-- <a class="collapse-item" href="{{route('')}}">Cards</a> --}}
            </div>
        </div>
    </li>
</ul>
