<x-guest-layout :pageTitle="'Register'">
<div class="login-box-body">
    <h3 class="login-box-msg text-primary">Sign Up</h3>
    <p class="login-box-msg">Welcome to CarBook</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

     <form method="POST" action="{{ route('register') }}">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required autofocus autocomplete="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype Password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="mt-5">
        Already have an account ? <a href="{{ route('login')}}" class="text-center">Sign In Here</a>
    </div>
  </div>
</x-guest-layout>
