@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
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
            <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Featured Cars -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $featuredCars }}</h3>
                <p>Featured Cars</p>
            </div>
            <div class="icon">
                <i class="ion ion-star"></i>
            </div>
            <a href="{{ route('admin.cars.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Total Cars -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $totalCars }}</h3>
                <p>Total Cars</p>
            </div>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <a href="{{ route('admin.cars.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Active Users -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $activeUsers }}</h3>
                <p>Active Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
    <div class="col-md-6">
        <!-- RECENT CAR LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Cars</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                   @foreach($recentCars as $car)
    <li class="item">
        <div class="product-img">
            <img src="{{ $car->image_url }}" alt="{{ $car->name }}" style="width: 50px; height: 50px;">
        </div>
        <div class="product-info">
            <a href="{{ route('admin.cars.edit', $car->id) }}" class="product-title">{{ $car->name }}</a>
            <span class="product-description">
                {{ $car->brand->name ?? 'No brand available.' }} |
                {{ $car->model ?? 'No model available.' }} |
                {{ $car->year ?? 'No year available.' }} |
                {{ $car->color ?? 'No color available.' }}
            </span>
        </div>
    </li>
@endforeach

                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ route('admin.cars.index') }}" class="uppercase">View All Cars</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- TABLE: LATEST BOOKINGS -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Bookings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Car</th>
                            <th>User</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestBookings as $booking)
                            <tr>
                                <td><a href="{{ route('admin.bookings.show', $booking->id) }}">{{ $booking->id }}</a></td>
                                <td>{{ $booking->car->name }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>
                                {!! getBookingStatusLabel($booking->status) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ route('admin.bookings.index') }}" class="uppercase">View All Bookings</a>
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
