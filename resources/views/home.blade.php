@extends('layouts.app')

@section('content')
<style>
    
    .auto-fit-container {
        display: flexbox;
        align-items: center;
        justify-content: center;
        height: 50%;
        margin-left: 20%;
    }

    .card {
        width: 50%;
        padding: 5px;
        border: 0px solid #e90a0a;
        border-radius: 2px;
        box-shadow: 0 4px 8px rgba(237, 206, 4, 0.948);
        background-color: #fff;
    }
</style>
<div class="container auto-fit-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status') == 'login-success')
                        <div class="alert alert-success" role="alert">
                            {{ __('Login Successful!') }}
                        </div>
                    @else 
                        <div class="alert alert-success" role="alert">
                            {{ __('Register Successful!') }}
                        </div>
                    @endif

                    <!-- Your other content here -->
                </div>
                
                <div class="col-md-8 offset-md-4">
                    <a class="btn btn-primary" href="{{ route('show-registered-data') }}">Show Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
