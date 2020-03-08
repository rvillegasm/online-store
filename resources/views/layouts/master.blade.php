<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>@yield('title','Home Page')</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
<body class="navbar-top-fixed">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">MY ONLINE STORE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check() && Auth::user()->hasRole('admin'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('home.Catalog') }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="btn-light dropdown-item" href="{{ route('admin.watch.index') }}" role="button">{{ __('watch.Watches') }}</a>
                                    <a class="btn-light dropdown-item" href="{{ route('admin.category.index') }}" role="button">{{ __('watch.Categories') }}</a>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-outline-dark btn-block" href="{{ route('cart.index') }}" role="button">
                                {{ __('home.My cart') }} <span class="badge badge-secondary">@if(session()->has('watches')) {{ count(array_unique(session()->get('watches'))) }} @else 0 @endif</span>
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" role="button">{{ __('auth.Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" role="button">{{ __('auth.Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->getName() }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-light dropdown-item">{{ __('auth.Logout') }}</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<footer class="footer mt-auto py-3">
    <div class="bg-dark py-4">
    </div>
    <div class="container row py-4 px-4">
        <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">{{ __('home.Team') }}</a></li>
            <li><a class="text-muted" href="#">{{ __('home.Privacy') }}</a></li>
            <li><a class="text-muted" href="#">{{ __('home.Terms') }}</a></li>
        </ul>
        </div>
    </div>
</footer>
</html>
