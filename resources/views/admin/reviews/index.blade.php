@extends('admin.layouts.app')

@php
$pageTitle = 'Manage Reviews'
@endphp

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Reviews
        <small>All Reviews</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manage Reviews</a></li>
        <li class="active">All Reviews</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reviews List</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="list-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Car</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->car->name }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->rating }} Stars</td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $review->created_at->format('Y-m-d') }}</td>
                            <td>
                                <!-- Delete User Form -->
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
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
