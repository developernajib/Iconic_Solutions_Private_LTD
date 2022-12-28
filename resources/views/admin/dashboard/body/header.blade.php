<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ App\Models\Admin::find(1)->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('assets/images/default-profile.png') }}">
            </a>
            <!-- Dropdown - User Information -->
            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf


                </form>
            </x-slot>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('user_logout') }}" data-toggle="modal"
                    data-target="#logoutModal">
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
