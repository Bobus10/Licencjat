<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link  rel="stylesheet" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    @php
        use App\Models\ShoppingCart;
    @endphp
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <i class="fa-regular fa-user"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @can('isAdmin')
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class="fa-solid fa-users"></i> {{ __('shop.user.index_title') }}</a>
                                        <a class="dropdown-item" href="{{ route('products.index') }}">
                                            <i class="fa-solid fa-rectangle-list"></i> {{ __('shop.product.index_title') }} </a>
                                    @endcan

                                        <a class="dropdown-item" href="{{ route('orders.index') }}">
                                            <i class="fa-solid fa-truck"></i> Zamówienia </a>

                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }} <i class="fa-solid fa-right-from-bracket"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link position-relative" href="{{ route('shopping-cart') }}"><i class="fa-solid fa-cart-shopping"></i>
                                    <span class="position-absolute top-75 start-100 translate-middle badge rounded-pill bg-success">
                                        {{ $cartItems = ShoppingCart::with('product')->where(['user_id'=>auth()->user()->id])->get()->count() }}
                                    </span>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript">
        @yield('javascript')
    </script>
    @yield('js-files')

    @livewireScripts
</body>

</html>
