@extends('user.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Dashboard
        <small>Your Overview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- Total Bookings -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $totalBookings }}</h3>
                    <p>Total Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Completed Bookings -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $completedBookings }}</h3>
                    <p>Completed Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Upcoming Bookings -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $upcomingBookings }}</h3>
                    <p>Upcoming Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Canceled Bookings -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $canceledBookings }}</h3>
                    <p>Canceled Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-close"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- RECENT BOOKINGS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Bookings</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        @foreach($recentBookings as $booking)
                        <li class="item">
                        <div class="product-img">
                            <img src="{{ $booking->car->image_url }}" alt="Product Image">
                          </div>
                            <div class="product-info">
                                <a href="#" class="product-title">{{ $booking->car->name }}
<span class="pull-right">{!! getBookingStatusLabel($booking->status) !!}</span>
                                </a>
                                <span class="product-description">
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
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="#" class="uppercase">View All Bookings</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->
@endsection
