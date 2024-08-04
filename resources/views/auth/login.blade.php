<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" />
    <title>Wafi Admin Template - Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<body class="authentication">
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="{{ asset('img/logo99.png') }}" alt="" class="img-center mb-1 circles"/>
                            </a>
                            <h5>Welcome back,<br />Please Login to your Account.</h5>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input id="remember_me" type="checkbox" class="custom-control-input" name="remember" />
                                    <label class="custom-control-label" for="remember_me">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                            <!-- Forgot Password Link -->
                            <div class="forgot-pwd">
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif
                            </div>

                            <hr>

                            <!-- Register Link -->
                            <div class="actions align-left">
                                <span class="additional-link">New here?</span>
                                <a href="{{ route('register') }}" class="btn btn-dark">Create an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
