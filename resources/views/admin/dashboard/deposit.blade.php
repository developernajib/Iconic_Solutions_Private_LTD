@extends('admin.dashboard.dashboard_base')
@section('title', 'Dashboard')
@section('admin')

    <form action="{{ route('admin_wallet_deposit_store') }}" method="post">
        @csrf
        <h3 class="text-center">Deposit Amount to user wallet</h3>
        <br>
        <label for="fname">To:</label><br>
        <input type="email" name="to" placeholder="Receiver email address" style="padding: 5px 10px;">
        <br>
        <br>
        <label for="lname">Amount:</label><br>
        <input type="number" name="amount" placeholder="Amount in USD" style="padding: 5px 10px;">
        <br>
        <br>
        <input type="submit" value="Deposit" class="btn btn-primary" style="color: black;">
    </form>

@endsection
