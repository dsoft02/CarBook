@extends('admin.layouts.app')

@php
$pageTitle = 'Manage Users'
@endphp

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Users
        <small>All Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
        <li class="active">All Users</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{{ route('admin.users.create') }}" class="btn bg-navy" title=""
                           data-original-title="Create New">
                            <i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="list-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Registered Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>{!! getStatusLabel($user->status) !!}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <!-- Edit User Button -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"
                                   title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Delete User Form -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Deactivate/Reactivate User Form -->
                                @if($user->status)
                                <form action="{{ route('admin.users.deactivate', $user->id) }}" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to deactivate this user?');">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm" title="Deactivate">
                                        <i class="fa fa-ban"></i>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admin.users.reactivate', $user->id) }}" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to reactivate this user?');">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" title="Reactivate">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@push('scripts')
<script>
    $('#list-table').DataTable();
</script>
@endpush
