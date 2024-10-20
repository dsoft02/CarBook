@extends('admin.layouts.app')

@php
$pageTitle = 'Edit Car'
@endphp

@push('styles')
@endpush
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Car
        <small>Manage Cars</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.cars.index') }}">Manage Car</a></li>
        <li class="active">Edit Car</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
              <div class="box box-primary">
                    <div class="box-header with-border">
                          <h3 class="box-title">Edit Car</h3>
                         <!-- tools box -->
                          <div class="pull-right box-tools">
                                <a href="{{ route('admin.cars.index') }}" class="btn bg-navy" title="" data-original-title="Back">
                                <i class="fa fa-undo"> </i> Back</a>
                          </div>
                          <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <form id="carForm" role="form" action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                          <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                          <label class="control-label" for="carName">Name <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="carName" name="name" value="{{ old('name', $car->name) }}" required>
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('brand_id') has-error @enderror">
                                          <label class="control-label" for="carBrand">Brand <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="carBrand" name="brand_id" style="width:100%" required>
                                                  <option value="">Select a Brand</option>
                                                  @foreach($brands as $brand)
                                                     <option value="{{ $brand->id }}" {{ (old('brand_id') == $brand->id || (isset($car) && $car->brand_id == $brand->id)) ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                  @endforeach
                                            </select>
                                            @error('brand_id')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('car_model_id') has-error @enderror">
                                          <label class="control-label" for="carModel">Model <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="carModel" name="car_model_id" style="width:100%" required>
                                                  <option value="">Select a Model</option>
                                                  @foreach($carModels as $carModel)
                                                     <option value="{{ $carModel->id }}" {{ (old('car_model_id') == $carModel->id || (isset($car) && $car->car_model_id == $carModel->id)) ? 'selected' : '' }}>
                                                        {{ $carModel->name }}
                                                    </option>
                                                  @endforeach
                                            </select>
                                            @error('car_model_id')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('year') has-error @enderror">
                                          <label class="control-label" for="year">Year <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="year" name="year" style="width:100%">
                                                <option value="">Select car year</option>
                                                @for ($year = date('Y'); $year >= 1900; $year--)
                                                    <option value="{{ $year }}" {{ (old('year') == $year || (isset($car) && $car->year == $year)) ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('year')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('seat_type_id') has-error @enderror">
                                          <label class="control-label" for="seatType">Seat Type <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="seatType" name="seat_type_id" style="width:100%" required>
                                                  <option value="">Select a seat type</option>
                                                  @foreach($seatTypes as $seatType)
                                                    <option value="{{ $seatType->id }}" {{ (old('seat_type_id') == $seatType->id || (isset($car) && $car->seat_type_id == $seatType->id)) ? 'selected' : '' }}>
                                                        {{ $seatType->name }}
                                                    </option>
                                                  @endforeach
                                            </select>
                                            @error('seat_type_id')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('fuel_type') has-error @enderror">
                                          <label class="control-label" for="fuel_type">Fuel Type <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="fuel_type" name="fuel_type"  value="{{ old('fuel_type', $car->fuel_type) }}">
                                            @error('fuel_type')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('color') has-error @enderror">
                                          <label class="control-label" for="color">Colour <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $car->color) }}" required>
                                            @error('color')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('doors') has-error @enderror">
                                          <label class="control-label" for="doors">Doors <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control number" id="doors" name="doors" value="{{ old('doors', $car->doors) }}" required>
                                            @error('doors')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('transmission') has-error @enderror">
                                          <label class="control-label" for="transmission">Transmission <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="transmission" name="transmission" value="{{ old('transmission', $car->transmission) }}" required>
                                            @error('transmission')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('mileage') has-error @enderror">
                                          <label class="control-label" for="mileage">Mileage <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="mileage" name="mileage" value="{{ old('mileage', $car->mileage) }}" required>
                                            @error('mileage')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('status') has-error @enderror">
                                          <label class="control-label" for="status">Visibility Status</label>
                                            <select class="form-control" id="status" name="status">
                                              <option value="1" {{ (old('status') === 1 || (isset($car) && $car->status === 1)) ? 'selected' : '' }}>Active</option>
                                              <option value="0" {{ (old('status') === 0 || (isset($car) && $car->status === 0)) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group @error('price') has-error @enderror">
                                          <label class="control-label" for="carBrand">Price <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control number" id="price" name="price" value="{{ old('price', $car->price) }}" required>
                                            @error('price')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('is_featured') has-error @enderror">
                                            <label class="control-label" for="is_featured">Featured Car</label>
                                            <select class="form-control" id="is_featured" name="is_featured">
                                                <option value="1" {{ (old('is_featured') === 1 || (isset($car) && $car->is_featured === 1)) ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ (old('is_featured') === 0 || (isset($car) && $car->is_featured === 0)) ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('is_featured')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('description') has-error @enderror">
                                          <label class="control-label" for="description">Description</label>
                                            <textarea id="description" name="description" rows="10" cols="80">{{ old('description', $car->description) }}</textarea>
                                            @error('description')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label">Images</label>
                                            <div class="image-upload-container" id="image-upload-container">
                                                <!-- Existing images -->
                                                @if(isset($car) && $car->images)
                                                    @php
                                                        $images = json_decode($car->images, true);
                                                    @endphp
                                                    @if(is_array($images) && count($images) > 0)
                                                        @foreach($images as $index => $image)
                                                            <div class="image-preview" data-index="{{ $index }}">
                                                                <img src="{{ asset('storage/' . $image) }}" alt="Car Image">
                                                                <button type="button" class="remove-btn" onclick="removeExistingImage({{ $index }})">&times;</button>
                                                                <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endif
                                                <!-- Add button -->
                                                <div class="image-upload-box" onclick="document.getElementById('images').click()">
                                                    <i class="fa fa-plus-circle fa-2x text-primary"></i>
                                                </div>
                                                <input type="file" name="images[]" id="images" multiple style="display: none;" accept="image/*" onchange="previewImages(event)">
                                            </div>
                                            <!-- Display the error message -->
                                            @if ($errors->has('images'))
                                                <span class="text-danger">{{ $errors->first('images') }}</span>
                                            @endif
                                            @if ($errors->has('images.*'))
                                                <span class="text-danger">{{ $errors->first('images.*') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <div class="row">
                                    <label class="col-md-12">Features</label>
                                    @foreach($carFeatures as $carFeature)
                                        <label class="col-md-3">
                                        <input type="checkbox" name="car_features[]" class="minimal-red" value="{{ $carFeature->id }}" {{ in_array($carFeature->id, old('car_features', $selectedFeatures)) ? 'checked' : '' }}>
                                        {{ $carFeature->name }}
                                        </label>
                                    @endforeach
                                    <!-- /.col -->
                                </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update Car</button>
                          </div>
                    </form>
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
<!-- CK Editor -->
<script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/pages/car.js') }}"></script>
@endpush
