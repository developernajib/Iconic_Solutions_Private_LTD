@extends('admin.dashboard.dashboard_base')
@section('title', 'Total Supply of currency')
@section('admin')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Currency Supply</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Total Amount</th>
                            <th>Base Currency</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($totalSupply->total_supply, 2) }}</td>
                            <td>{{ $totalSupply->base_currency }}</td>
                            <td>{{ $totalSupply->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
