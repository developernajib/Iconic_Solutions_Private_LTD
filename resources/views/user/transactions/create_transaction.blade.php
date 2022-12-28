@extends('user.dashboard_base')
@section('title', 'Dashboard')
@section('user')
    <form action="{{ route('user_transaction_create_store') }}" method="post">
        @csrf
        <label for="fname">To:</label><br>
        <input type="email" name="to" placeholder="Receiver email address">
        <br>
        <br>
        <label for="lname">Amount:</label><br>
        <input type="number" name="amount" placeholder="Amount in USD">
        <br>
        <br>
        <input type="submit" value="Transact" class="btn btn-primary" style="color: black;">
    </form>
@endsection
