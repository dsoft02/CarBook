@extends('admin.layouts.app')

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bookings List
        <small>All Bookings</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.bookings.index') }}">Manage Bookings</a></li>
        <li class="active">All Bookings</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">All Bookings</h3>
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
                            <th>User</th>
                            <th>Car</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->car->name }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>₦{{ number_format($booking->total_price, 2) }}</td>
                            <td>{!! getBookingStatusLabel($booking->status) !!}</td>
                            <td>
                                <div style="display: flex; align-items: center;">
									<!-- View Button -->
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                       class="btn btn-primary btn-sm" title="View Booking">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Cancel Button -->
                                    @if($booking->status !== 'completed' && $booking->status !== 'canceled')
                                    <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to cancel this booking?');"
                                          class="mr-2" style="margin-left: 5px;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" title="Cancel Booking">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    @endif

                                    <!-- Mark as Complete Button -->
                                    @if($booking->status !== 'completed' && $booking->status !== 'canceled')
                                    <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to mark this booking as complete?');"
                                          class="mr-2" style="margin-left: 5px;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" title="Mark as Complete">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
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
<script src="{{ asset('backend/js/pages/car.js') }}"></script>
@endpush
