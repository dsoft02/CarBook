<x-guest-layout :pageTitle="'Reset Password'">
<div class="login-box-body">
    <h3 class="login-box-msg text-primary">Reset Password?</h3>
    <p class="login-box-msg">Fill out the form below to update your password</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="form-group has-feedback">
        <label class="control-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <label class="control-label" for="password">New Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <label class="control-label" for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="mt-5">
        Back to sign-in page <a href="{{ route('login')}}" class="text-center">Click Here</a>
    </div>
  </div>
</x-guest-layout>
