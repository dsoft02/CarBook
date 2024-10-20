<x-guest-layout :pageTitle="'Login'">
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="current-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label for="remember_me">
              <input id="remember_me" name="remember" type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">I forgot my password</a><br>
    @endif
    Do not have an account ? <a href="{{ route('register') }}" class="text-center">Sign Up Here</a>

  </div>
</x-guest-layout>
