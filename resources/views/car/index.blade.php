@extends('layouts.sitemaster')

@push('styles')
@endpush

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span>Choose Your Car <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-box">
                    <h2 class="heading text-primary">Filter</h2>
                    <form action="{{ route('cars.index') }}" method="GET">
                        <div class="form-group">
                            <label for="car_name">Car Name</label>
                            <input type="text" name="car_name" id="car_name" class="form-control" value="{{ request('car_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
                        </div>
                        <div class="form-group">
                            <div class="accordion" id="accordionBrands">
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <a href="#collapseBrands" class="accordion-button d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true" aria-controls="collapseBrands" style="flex-grow: 1; text-decoration: none;">
                                            Select Brand
                                            <span class="ms-auto" id="toggleArrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </a>
                                    </h5>
                                    <div id="collapseBrands" class="accordion-collapse collapse show" aria-labelledby="headingBrands">
                                        <div class="accordion-body">
                                            <span class="select-Brand-box py-3">
                                            @foreach ($brands as $brand)
                                                <span class="form-check d-flex justify-content-between">
                                                    <div>
                                                        <input name="brands[]" class="form-check-input" type="checkbox" id="brand_{{ $brand->id }}" value="{{ $brand->id }}" {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label ml-2" for="brand_{{ $brand->id }}">
                                                            {{ $brand->name }}
                                                        </label>
                                                    </div>
                                                    <span class="text-muted ms-auto">({{ $brand->total_cars }})</span>
                                                </span>
                                            @endforeach
                                            </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-9 d-flex flex-wrap">
                @foreach ($cars as $car)
                    <div class="col-lg-4 col-md-6 col-12 ftco-animate">
                        <div class="blog-entry car-card">
                            @php
                                // Decode the JSON-encoded images
                                $images = json_decode($car->images, true);
                                // Get the first image or use the default if empty
                                $firstImage = !empty($images) ? asset('storage/' . $images[0]) : asset('frontend/images/car-1.jpg');
                            @endphp

                            <a href="{{ route('cars.show', $car->id) }}" class="block-20" style="background-image: url('{{ $firstImage }}');">
                            </a>

                            <div class="text p-4">
                                <h3 class="heading mb-0"><a href="{{ route('cars.show', $car->id) }}">{{ $car->name }}</a></h3>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{ $car->brand->name }}</span>
                                    <p class="price ml-auto">{{ $car->formated_price }} <span>/day</span></p>
                                </div>
                                <div class="brand-car-inner-item-main">
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-gas-pump"></i></span>
                                        </div>
                                        <span>{{ $car->fuel_type }}</span>
                                    </div>
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-calendar-days"></i></span>
                                        </div>
                                        <span>{{ $car->model_year }} Model</span>
                                    </div>
                                    <div class="brand-car-inner-item-two">
                                        <div class="brand-car-inner-item-thumb">
                                            <span><i class="fa fa-car-side"></i></span>
                                        </div>
                                        <span>{{ $car->seatType->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    <div class="row mt-5">
                        <div class="col d-flex justify-content-center">
                            {{ $cars->links('vendor.pagination.custom-pagination') }} <!-- Use the custom pagination view -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', () => {
            const arrow = button.querySelector('#toggleArrow i');
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Toggle the arrow icon classes based on the expanded state
            arrow.classList.toggle('fa-chevron-down', !isExpanded);
            arrow.classList.toggle('fa-chevron-right', isExpanded);
        });
    });

</script>

@endpush
