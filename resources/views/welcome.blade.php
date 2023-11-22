@extends('layouts.app')

@section('content')
        <style>

            .right-side-container {
                /* Light blue color code */
                margin-top: 10%;
                margin-left: 10%;
                margin-right: 20%;
                z-index: 1;
                padding: 20px; /* Add padding for better visual appearance */
            }
           
            .left-side-container {
                /* Light blue color code */
                margin-top: 0%;
                margin-left: 10%;
                margin-right: 20%;
                z-index: 1;
                padding: 10px; /* Add padding for better visual appearance */
            }
    
            .center-image-container{
                display:flex;
                justify-content:right;
                align-items:left;
                background-color;
    
            }

            .center-right img {
            position: absolute;
            top: 20%;
            transform: translateY(-20%);
            transform: translateX(20%);
            right: 20%;
            }

            .center-right p {
            position: absolute;
            text-align: justify; /* Justify the text */
            text-align-last: center; /* Center the last line of text */
            top: 50%; right:10%; bottom: 10%;
            font-family: 'Arizonia', sans-serif;  font-size: 50px ; 
            color:black;
            text-shadow: 2px 2px 4px rgba(251, 4, 4, 1); 
            z-index: 1;
            }
        </style>

<div class="container center-image-container">
    <div class="row center-right">
        <div class="col-md-6">
            
            <p>Information Technology<br>
               Ticketing System<br>
             ITTS, the solution for all your problems!  :)<br>
            I am one alert away.</p>
            
            
        </div>
        <div class="col-md-6">
            <img src="/images/logo3.png" alt="Your Image" class="img-fluid" style="width:5in;height:5in;">
        </div>
    </div>
</div>     

<div class="container right-side-container">
    <div class="row ">
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="uname" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="uname" type="uname" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required autocomplete="uname" autofocus>

                                @error('uname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                

                                <button type="submit" class="btn btn-primary" href="{{ route('home') }}">{{ __('Login') }}
                                </button>

                                 <a type="submit" class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }} </a>                         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
