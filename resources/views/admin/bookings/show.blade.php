@extends('admin.layouts.app')

@php
$pageTitle = 'Car List'
@endphp

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Bookings
        <small>View Booking</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.bookings.index') }}">Manage Bookings</a></li>
        <li class="active">View Booking</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">View Booking</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{{ route('admin.bookings.index') }}" class="btn bg-navy" title="" data-original-title="Back">
                                <i class="fa fa-undo"> </i> Back</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="title text-primary mb-0"
                                style="margin-top:0px; margin-bottom:0px; font-weight:bold;">
                                {{ $booking->car->name }}
                            </h1>
                            <div style="display:flex;align-items:center;flex-wrap: nowrap;">
                                <div style="margin-right: 10px;">
                                    <strong>Brand:</strong> {{ $booking->car->brand->name }}
                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Model:</strong> {{ $booking->car->carModel->name }}
                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Year:</strong> {{ $booking->car->year }}
                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Color:</strong> {{ $booking->car->color }}
                                </div>
                            </div>
                            <div class="ratings mb-0 text-warning">
                                <p class="star mb-0">
                    <span>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="ion-ios-star{{ $i <= $booking->car->averageRating() ? '' : '-outline' }}"></i>
                        @endfor
                    </span>
                                    ({{ $booking->car->totalRatings() }} ratings)
                                </p>
                            </div>
                            <div class="price-area mb-3">
                                <h3 class="price font-weight-bold text-primary">{{ $booking->car->formated_price }}
                                    <sub>/day</sub></h3>
                            </div>
                            <img class="img-responsive pad" src="{{ $booking->car->image_url }}" alt="Photo">

                        </div>
                        <div class="col-lg-6 align-self-start pt-3">
                            <div class="rent__single">
                                <div class="text-justify">
                                    <h4 class="text-primary">Description</h4>
                                    {!! $booking->car->description !!}
                                </div>
                                <!-- Booking Details Table -->
                                <table class="table table-bordered mt-3">
                                    <tbody>
                                    <tr>
                                        <td>Booking ID</td>
                                        <td>{{ $booking->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>User Name</td>
                                        <td>{{ $booking->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>
                                        <td>{{ $booking->start_date->format('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <td>End Date</td>
                                        <td>{{ $booking->end_date->format('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Price</td>
                                        <td>{{ $booking->formated_total_price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{!! getBookingStatusLabel($booking->status) !!}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!-- Action Buttons -->
                                <!-- Action Buttons -->
                                <div class="btn__grp mt-3">
                                    @if ($booking->status === 'pending')
                                    <!-- Button to cancel the booking -->
                                    <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-danger"
                                                onclick="return confirm('Are you sure you want to cancel this booking?');">
                                            Cancel Booking
                                        </button>
                                    </form>

                                    <!-- Button to mark the booking as complete -->
                                    <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-success"
                                                onclick="return confirm('Are you sure you want to mark this booking as complete?');">
                                            Mark as Complete
                                        </button>
                                    </form>
                                    @elseif ($booking->status === 'canceled')
                                        <p class="text-danger">This booking has been canceled.</p>
                                    @elseif ($booking->status === 'completed')
                                        <p class="text-success">This booking has been completed.</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
@endpush
