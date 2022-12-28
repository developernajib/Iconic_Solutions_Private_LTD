@extends('admin.dashboard.dashboard_base')
@section('title', 'Dashboard')
@section('admin')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">3rd higest transaction details:-</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thirdHighestRecords as $thirdHighestRecord)
                            <tr>
                                <td>{{ $thirdHighestRecord->id }}</td>
                                <td>{{ $thirdHighestRecord->from }}</td>
                                <td>{{ $thirdHighestRecord->to }}</td>
                                <td>{{ $thirdHighestRecord->amount }} USD</td>
                                <td>{{ $thirdHighestRecord->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Highest amount of transactions in values</h6>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $transactionAmount->from }}</td>
                            <td>{{ $UserTransactionsTotalAmount }} USD</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Highest number of transactions</h6>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $transactionNumbers->from }}</td>
                            <td>{{ $UserTransactionsTotalNumber }} Times</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
