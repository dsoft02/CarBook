@extends('layouts.sitemaster')

@push('styles')
@endpush
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Address:</span> Department of Computer Science, Faculty of Natural Sciences, Lagos State University</p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Phone:</span> <a href="tel://+2349169442847">+234 916 9442 847</a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:ebendev09@gmail.com">ebendev09@gmail.com</a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
            <form class="bg-light p-5 contact-form" action="{{ route('contact.store') }}" method="POST">
                @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}" required>
                @php $message = ['Hello world']; @endphp
                <x-alert-error :messages="$errors->get('name')" class="mt-2" />
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                <x-alert-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                <x-alert-error :messages="$errors->get('subject')" class="mt-2" />
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" name="message" id="message" placeholder="Message">{{ old('message') }}</textarea>
                <x-alert-error :messages="$errors->get('message')" class="mt-2" />
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

@endsection

@push('scripts')
@endpush
