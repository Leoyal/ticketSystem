@extends('layouts.app')

@section('content')
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endpush
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($cardName) ? $cardName : __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $formRoute ?? route('register') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('minitial') is-invalid @enderror " name="fname" value="{{old('fname')}}" required>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="minitial" class="col-md-4 col-form-label text-md-end">{{ __('Middle Initial') }}</label>

                            <div class="col-md-6">
                                <input id="minitial" type="text" class="form-control @error('minitial') is-invalid @enderror" name="minitial" value="{{old('minitial') }}" required >

                                @error('minitial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required >

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="uname" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="uname" type="uname" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required autocomplete="uname">

                                @error('uname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>
                            <div class="col-md-6">  
                                <select name="sex" id="sex" class="form-control" >
                                    <option value=" "></option>   
                                    @foreach(config('sex_options') as $key => $value)  
                                    <option value="{{ $key }}" {{old('sex')== $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                </select>                              
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="bday"
                                class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="bday" value="{{ old('bday') }}">                      
                                @error('bday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>
                            <div class="col-md-6">  
                                <select name="position" id="position" class="form-control" value="{{ old('sex') }}">
                                    <option value=" ">Select an option</option>
                                    @foreach(config('position_options') as $key => $value)
                                    <option value="{{ $key }}" {{old('position')== $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                </select>                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="division" class="col-md-4 col-form-label text-md-end">{{ __('Division') }}</label>
                            <div class="col-md-6">  
                                <select name="division" id="division" class="form-control">
                                    <option value=" ">Select an option</option>
                                    @foreach(config('division_options') as $key => $value)
                                    <option value="{{ $key }}" {{old('division')== $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                @error('division')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                </select>                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="unit" class="col-md-4 col-form-label text-md-end">{{ __('Unit') }}</label>
                            <div class="col-md-6">  
                                <select name="unit" id="division" class="form-control">
                                    <option value=" ">Select an option</option>
                                    @foreach(config('unit_options') as $key => $value)
                                    <option value="{{ $key }}" {{old('unit')== $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                </select>                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="idno" class="col-md-4 col-form-label text-md-end">{{ __('Employee Id No.') }}</label>

                            <div class="col-md-6">
                                <input id="idno" type="idno" class="form-control @error('idno') is-invalid @enderror" name="idno" value="{{ old('idno') }}" required autocomplete="idno">

                                @error('idno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($registerButtonText) ? __($registerButtonText) : __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            flatpickr("input[type=datetime]",{
                enableTime:false,
                dateFormat: "m-d-Y",
                showIcon:true,
                // You can customize the date format as needed
            });
        });
</script>
@endpush
@endsection

