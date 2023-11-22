@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('update-user', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" value="{{ $user->fname }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="minitial">Middle Initial</label>
                                <input type="text" name="minitial" id="minitial" class="form-control" value="{{ $user->minitial }}">
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" value="{{ $user->lname }}">
                            </div>

                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input type="text" name="uname" id="uname" class="form-control" value="{{ $user->uname }}">
                            </div>

                            <div class="form-group">
                            <label for="sex">Sex</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="Male" {{ $user->sex === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->sex === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="bday">Birthdate</label>
                                <div class="row">
                                    <div class="col">
                                        <select name="year" id="year" class="form-control">
                                            @for ($i = date('Y'); $i >= 1900; $i--)
                                                <option value="{{ $i }}" {{ $i == date('Y', strtotime($user->bday)) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="month" id="month" class="form-control">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}" {{ $i == date('n', strtotime($user->bday)) ? 'selected' : '' }}>{{ date('F', strtotime("2022-$i-01")) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="day" id="day" class="form-control">
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}" {{ $i == date('j', strtotime($user->bday)) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="position">{{ __('Position') }}</label>
                                <div class="col-md-6">  
                                    <select name="position" id="position" class="form-control">
                                        <option value=" ">Select an option</option>
                                        @foreach(config('position_options') as $key => $value)
                                            <option value="{{ $key }}"{{ $key == $user->position ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                    </select>                              
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="division">Division</label>
                                <div class="col-md-6">  
                                    <select name="division" id="division" class="form-control" value="{{ $user->division}}">
                                        <option value=" ">Select an option</option>
                                        @foreach(config('division_options') as $key => $value)
                                            <option value="{{ $key }}" {{ $key == $user->division ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    @error('division')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                    </select>                              
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="unit">{{ __('Unit') }}</label>
                                <div class="col-md-6">  
                                    <select name="unit" id="division" class="form-control">
                                        <option value=" ">Select an option</option>
                                        @foreach(config('unit_options') as $key => $value)
                                            <option value="{{ $key }}"{{ $key == $user->unit ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    @error('unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                    </select>                              
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">  
                                    <label for="idno">Employee ID</label>
                                    <input type="text" name="idno" id="idno" class="form-control" value="{{ $user->idno }}">
                                </div>
                            </div>                                                
                                <!-- Add more form fields for other user attributes as needed -->
                            <div class="col-md-12 d-flex justify-content-center mt-3">  
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" >Update</button>
                                </div>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection