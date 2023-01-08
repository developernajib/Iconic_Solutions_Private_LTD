@extends('user.dashboard_base')
@section('title', 'Dashboard')
@section('user')

    @if (Session::has('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session::get('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <p>Hi, {{ Auth::user()->name }}</p>
    <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Curency Conversion through API</h6>
        </div>
        <form action="{{ route('currency_conversion_store') }}" method="post" class="py-5 px-4">
            @csrf
            <p><mark><b>Wallet Balance: {{ $walletBalance }}{{" "}}
            @if(gettype($walletBalance) == "integer")
                USD
            @endif
            </b></mark></p>
            <br>
            <label for="lname">Select Currency</label><br>
            <select name="currency" required="" class="form-control">
                <option value="USD" selected="" disabled="">Select
                    Currency</option>
                @foreach ($supportedCurrencies as $supportedCurrencie)
                    <option value="{{ $supportedCurrencie->currency }}">
                        {{ $supportedCurrencie->currency }}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Convert" class="btn btn-primary" style="color: black;">
        </form>
    </div>

@endsection
