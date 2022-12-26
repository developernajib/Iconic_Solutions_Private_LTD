@extends('admin.dashboard.dashboard_base')
@section('title', 'Dashboard')
@section('admin')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usersData as $userData)
                            <tr>
                                <td>{{ $userData->name }}</td>
                                <td>{{ $userData->email }}</td>
                                <td>{{ $userData->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
