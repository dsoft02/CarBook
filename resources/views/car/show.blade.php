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
                                class="ion-ios-arrow-forward"></i></a></span> <span><a href="{{ route('cars.index') }}">Cars <i
                            class="ion-ios-arrow-forward"></i></a></span></p>
                <h1 class="mb-3 bread">Car Details</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-car-details">
    <div class="container-fluid">
        <div class="row gy-5">
            <div class="col-lg-6">
                <div class="car-details">
                    <div class="img img-main rounded mb-3"
                         style="background-image: url('{{ asset('storage/' . json_decode($car->images)[0]) }}');"></div>

                    @if(isset($car) && $car->images)
                    @php
                    $images = json_decode($car->images, true);
                    @endphp
                    @if(is_array($images) && count($images) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-gallery owl-carousel car-gallery-carousel">
                                @foreach($images as $index => $image)
                                <div class="item">
                                    <div class="car-wrap rounded ftco-animate">
                                        <div class="img car-gallery rounded d-flex align-items-end"
                                             style="background-image: url('{{ asset('storage/' . $image) }}');">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            <div class="col-lg-6 align-self-start pt-3">
                <div class="rent__single">
                    <h3 class="title font-weight-bold text-primary mb-0">{{ $car->name }}</h3>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="detail-item mr-3">
                            <strong>Brand:</strong> {{ $car->brand->name }}
                        </div>
                        <div class="detail-item mr-3">
                            <strong>Model:</strong> {{ $car->carModel->name }}
                        </div>
                        <div class="detail-item mr-3">
                            <strong>Year:</strong> {{ $car->year }}
                        </div>
                        <div class="detail-item mr-3">
                            <strong>Color:</strong> {{ $car->color }}
                        </div>
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

                    <div class="content text-justify">{!! $car->description !!}</div>
                    <div class="btn__grp">
                         @auth
                            <!-- Redirect authenticated users to the booking page -->
                            <a href="{{ route('user.booking.create', $car->id) }}" class="btn btn-lg btn-primary">Book Your Ride</a>
                        @else
                            <!-- Redirect unauthenticated users to the login page -->
                            <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Book Your Ride</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Mileage
                                    <span>{{ number_format($car->mileage, 0) }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Transmission
                                    <span>{{ $car->transmission }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Seats
                                    <span>{{ $car->seatType->name }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-backpack"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Doors
                                    <span>{{ $car->doors }} Doors</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Fuel
                                    <span>{{ $car->fuel_type }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills mt-0">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                   href="#pills-description" role="tab" aria-controls="pills-description"
                                   aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                   role="tab" aria-controls="pills-review" aria-expanded="true">Review ({{
                                    $car->totalRatings() }})</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                             aria-labelledby="pills-description-tab">
                            <div class="row">
                                @foreach ($carFeatures as $index => $carFeature)
                                @if ($index % 4 === 0 && $index !== 0)
                            </div> <!-- Close the previous column -->
                            <div class="col-md-4"> <!-- Start a new column -->
                                <ul class="features">
                                    @elseif ($index === 0)
                                    <div class="col-md-4"> <!-- Start the first column -->
                                        <ul class="features">
                                            @endif

                                            <li class="{{ in_array($carFeature->id, $car->selectedFeatures()) ? 'check' : 'remove' }}">
                                                <span
                                                    class="ion-ios-{{ in_array($carFeature->id, $car->selectedFeatures()) ? 'checkmark' : 'close' }}"></span>
                                                {{ $carFeature->name }}
                                                <!-- Adjust this based on how you're accessing the feature's name -->
                                            </li>

                                            @if ($index === count($carFeatures) - 1)
                                        </ul> <!-- Close the last column's list -->
                                    </div> <!-- Close the last column -->
                                    @endif
                                    @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rating-wrap mb-4">
                                        @auth
                                        <!-- Show the review form for authenticated users -->
                                        @if (!$car->userHasReviewed())
                                            <h3 class="head mb-0">Leave a Review</h3>
                                            <form action="{{ route('ratings.store', $car->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group mb-0">
                                                    <label for="rating">Rating:</label>
                                                    <div class="star-rating mb-0">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                        <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}"
                                                               required>
                                                        <label for="star{{ $i }}" class="mb-0">
                                                            <i class="ion-ios-star"></i>
                                                        </label>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Your Review:</label>
                                                    <textarea name="comment" id="comment" class="form-control" rows="5"
                                                              required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                            </form>
                                            @endif
                                        @endauth

                                        @guest
                                        <!-- Show a message for unauthenticated users -->
                                        <p class="mt-3">Please <a href="{{ route('login') }}">login</a> to leave a
                                            review.</p>
                                        @endguest
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    @if ($car->totalRatings() > 0)
                                    <h3 class="head">{{ $car->totalRatings() }} Reviews</h3>
                                    @else
                                    <h3 class="head">Not yet reviewed</h3>
                                    @endif

                                    @foreach ($car->ratings as $rating)
                                    <div class="review d-flex mb-3">
                                        <div class="user-img"
                                             style="background-image: url('{{ $rating->user->profile_picture_url }}')"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">{{ $rating->user->name }}</span>
                                                <span
                                                    class="text-right">{{ $rating->created_at->format('d F Y') }}</span>
                                            </h4>
                                            <p class="star">
                    <span>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="ion-ios-star{{ $i <= $rating->rating ? '' : '-outline' }}"></i>
                        @endfor
                    </span>
                                            </p>
                                            <p>{{ $rating->comment }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-5">
                                    <div class="rating-wrap">
                                        <h3 class="head">Review Analysis</h3>
                                        <div class="wrap">
                                            @foreach ($car->reviewAnalysis() as $stars => $data)
                                                <p class="star">
                                                    <span>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="ion-ios-star{{ $i <= $stars ? '' : '-outline' }}"></i>
                                                        @endfor
                                                        ({{ $data['percentage'] }}%)
                                                    </span>
                                                    <span>{{ $data['count'] }} Reviews</span>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@endpush
