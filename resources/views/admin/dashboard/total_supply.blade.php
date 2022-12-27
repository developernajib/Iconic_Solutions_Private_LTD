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
                            <th>Id</th>
                            <th>Total Amount</th>
                            <th>Base Currency</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $totalSupply->id }}</td>
                            <td>{{ number_format($totalSupply->total_supply, 2) }}</td>
                            <td>{{ $totalSupply->base_currency }}</td>
                            <td>{{ $totalSupply->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Supply Left</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Supply Left</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $leftOverSupply->id }}</td>
                            <td>{{ number_format($leftOverSupply->total_supply_left, 2) }} USD</td>
                            <td>{{ $leftOverSupply->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
