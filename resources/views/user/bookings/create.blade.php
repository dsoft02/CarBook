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
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span><a
                            href="{{ route('cars.show', $car->id) }}">Cars <i
                                class="ion-ios-arrow-forward"></i></a></span></p>
                <h1 class="mb-3 bread">Car Booking</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-car-details">
    <div class="container-fluid">
        <div class="row gy-5">
            <!-- Car Information Section -->
            <div class="col-md-12">
            <div class="car-details">
                    <h3 class="title font-weight-bold text-primary mb-0">{{ $car->name }}</h3>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="detail-item mr-3"><strong>Brand:</strong> {{ $car->brand->name }}</div>
                        <div class="detail-item mr-3"><strong>Model:</strong> {{ $car->carModel->name }}</div>
                        <div class="detail-item mr-3"><strong>Year:</strong> {{ $car->year }}</div>
                        <div class="detail-item mr-3"><strong>Color:</strong> {{ $car->color }}</div>
                    </div>
                    <div class="ratings mb-0 text-warning">
                        <p class="star mb-0">
                        <span>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="ion-ios-star{{ $i <= $car->averageRating() ? '' : '-outline' }}"></i>
                            @endfor
                        </span>
                            ({{ $car->totalRatings() }} ratings)
                        </p>
                    </div>
                    <div class="price-area mb-3">
                        <h5 class="price font-weight-bold text-primary">{{ $car->formated_price }} <sub>/day</sub></h5>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="car-details">
                     <div class="img img-main rounded mb-3"
                         style="background-image: url('{{ asset('storage/' . json_decode($car->images)[0]) }}');"></div>
                </div>
            </div>

            <!-- Booking Form Section -->
            <div class="col-md-6">
                <div class="booking-form">
                    <h3 class="font-weight-bold">Booking Form</h3>
                    <form id="booking-form" action="{{ route('user.booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="trx" id="trx">
                        <input type="hidden" name="total_price" id="total_price_value">

                        <div class="form-group">
                            <label for="pickup_date">Pickup Date:</label>
                            <input type="date" name="pickup_date" id="pickup_date" class="form-control" placeholder="dd-mm-yyyy" required>
                        </div>
                        <div class="form-group">
                            <label for="return_date">Return Date:</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" required>
                        </div>

                        <!-- Total Price Display -->
                        <div class="form-group d-flex align-items-center">
                            <label for="total_price" class="mr-2 mb-0">Total Price:</label>
                            <h5 id="total_price" class="text-primary font-weight-bold mb-0">₦0</h5>
                        </div>

                        <!-- Paystack Payment Button -->
                        <button type="button" id="pay-now-btn" class="btn btn-primary">Pay & Confirm Booking</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://js.paystack.co/v2/inline.js"></script>
<script>
    const dailyPrice = {{ $car->price }};
    const carId = {{ $car->id }};
    const carName = "{{ $car->name }}";
    const paystackPublicKey = '{{ config("services.paystack.key") }}';
    const userEmail = '{{ auth()->user()->email }}';
</script>

<script src="{{ asset('frontend/js/pages/booking.js') }}"></script>
@endpush
