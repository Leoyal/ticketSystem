<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- For mobile devices -->
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>{{ config('app.name', 'ITTS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Arizonia" rel="stylesheet">
    @stack('style')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    

    <style>
        body {
            background-color: lightskyblue; /* Replace with your desired color code 
            /* You can also use color names like 'red', 'blue', etc. */
            /*background-image: url('/images/logo.jpg') ;
            background-size: cover;*/
        }
        footer.page-footer {
            bottom: 0;
            color: #fff;
        }
        .page-footer, .top-nav-collapse {
            background-color: #1c2331;
        }
        .page-footer {
            position: fixed;
            right: 0;
            left: 0;
            bottom: 0;
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        .circuit-image {
            position: absolute; /* Position the image absolutely within the left section */
            top: 0; /* Align to the top of the left section */
            left: 0;
            width:100%; /* Align to the left of the left section */
            max-width: 100%; /* Ensure the image doesn't exceed its container */
            height: ; /* Maintain the aspect ratio */
            display: block; /* Remove extra spacing below the image */
        }
    </style>
</head>
<body>
    <img class="circuit-image" src="/images/set.png" style="width:7.5in;height:7.5in" alt="Circuit Design">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand img-thumbnail" href="{{ url('/') }}">
                    <img src="/images/logo3.png" style="width:1cm;height:1cm">
                    {{config('app.name', 'ITTS')}}               
                </a>
                <button class="navbar-toggler btn-outline-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                          {{--  @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->lname.' '.Auth::user()->fname }}

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
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

<footer class="page-footer font-small navbar-dark">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-2 text-white">
        <small>© Department of Science &amp; Technology - Cordillera Administrative Region All Rights Reserved 2023</small>
    </div>
    <!-- Copyright -->
</footer>
@stack('scripts')
</body>
</html>
