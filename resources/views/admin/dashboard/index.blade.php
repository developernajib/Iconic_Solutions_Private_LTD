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
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thirdHighestRecords as $thirdHighestRecord)
                            <tr>
                                <td>{{ $thirdHighestRecord->id }}</td>
                                <td>{{ $thirdHighestRecord->from }}</td>
                                <td>{{ $thirdHighestRecord->to }}</td>
                                <td>{{ $thirdHighestRecord->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
