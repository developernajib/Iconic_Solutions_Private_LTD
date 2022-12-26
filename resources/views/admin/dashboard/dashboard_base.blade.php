<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'P2P Wallet System')</title>
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body id="p2p_wallet">

    <div id="wrapper">

        @include('admin.dashboard.body.aside')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.dashboard.body.header')

                <div class="container-fluid">

                    @if (Session::has('alert'))
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ session::get('alert') }}</strong>
                        </div>
                    @endif

                    @yield('admin')

                </div>
            </div>
        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
</body>

</html>
