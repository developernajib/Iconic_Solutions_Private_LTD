@extends('user.dashboard_base')
@section('title', 'Dashboard')
@section('user')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userTransactions as $userTransaction)
                            <tr>
                                <td>{{ $userTransaction->from }}</td>
                                <td>{{ $userTransaction->to }}</td>
                                <td>{{ number_format($userTransaction->amount, 2) }}</td>
                                <td>{{ $userTransaction->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
