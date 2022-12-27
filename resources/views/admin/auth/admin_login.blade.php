@extends('admin.auth.auth_base')
@section('title', 'Admin Login')
@section('admin')
    <div class="flex">

        @if (Session::has('alert'))
            <div class="alert alert-warning" role="alert" style="background: #F89406;padding: 10px;border-radius: 10px;">
                <strong>{{ session::get('alert') }}</strong>
            </div>
        @endif

        <form action="{{ route('admin_login_store') }}" method="post">
            @csrf
            <div class="login">
                <h2>Admin Login</h2>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" required="required" />
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required="required" />
                <label for="secret_code">Secret Code</label>
                <input type="text" name="secret_code" placeholder="Secret Code" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
            </div>
        </form>
    </div>
@endsection
