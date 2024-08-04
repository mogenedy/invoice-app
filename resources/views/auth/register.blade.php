<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" />
    <title>Wafi Admin Template - Signup</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<body class="authentication">
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="{{ asset('img/logo99.png') }}" alt="Wafi Admin Dashboard" />
                            </a>
                            <h5>Welcome,<br />Create your Admin Account.</h5>

                            <!-- Name -->
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me">
                                    <label class="custom-control-label" for="remember_me">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Signup</button>
                            </div>

                            <hr>

                            <div class="m-0">
                                <span class="additional-link">Have an account? <a href="{{ route('login') }}" class="btn btn-dark">Login</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
