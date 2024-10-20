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
        Car List
        <small>Manage Cars</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.cars.index') }}">Manage Car</a></li>
        <li class="active">Car List</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Car List</h3>
               <!-- tools box -->
              <div class="pull-right box-tools">
                <a href="{{ route('admin.cars.create') }}" class="btn bg-navy" title="" data-original-title="Create New" >
                  <i class="fa fa-plus"></i> Create New</a>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="list-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Seat Type</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $indx => $car)
                <tr>
                    <td>{{ $indx + 1 }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->carModel ? $car->carModel->name : 'N/A' }}</td>
                    <td>{{ $car->seatType->name }}</td>
                    <td>{{ $car->formated_price }}</td>
                    <td>{!! getStatusLabel($car->status) !!}</td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn bg-navy" title="" data-original-title="Edit car"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.cars.destroy', $car->id) }}" class="btn btn-danger" data-confirm-delete="true" title="" data-original-title="Delete car model"><i class="fa fa-trash"></i> Delete</a>
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
