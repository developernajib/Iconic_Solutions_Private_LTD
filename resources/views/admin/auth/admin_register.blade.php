@extends('admin.auth.auth_base')
@section('title', 'Admin Login')
@section('admin')
    <div class="flex">

        @if (Session::has('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <form action="{{ route('admin_register_store') }}" method="post">
            @csrf
            <div class="login">
                <h2>Admin Register</h2>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" required="required" />
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" required="required" />
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required="required" />
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" placeholder="Password" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
            </div>
        </form>


    </div>
@endsection
