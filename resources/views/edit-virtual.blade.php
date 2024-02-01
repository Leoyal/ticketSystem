@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Virtual Request</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('update-virtual', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="v_event" class="col-md-4 col-form-label text-md-end">{{ __('Title of the Virtual Event') }}</label>
    
                                <div class="col-md-6">
                                    <input id="v_event" type="text" class="form-control @error('minitial') is-invalid @enderror " name="v_event" value="{{$user->v_event}}" required>
    
                                    @error('v_event')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
           
                            <div class="mb-3 row">
                                <label for="e_start"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Start of the Event') }}</label>
    
                                <div class="col-md-6">
                                    <input type="date" class="form-control " name="e_start" value="{{ $user->e_end }}">                      
                                    @error('e_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-1 row">
                                <label for="t_start" class="col-md-4 col-form-label text-md-end">{{ __('Start Time') }}</label>
                            
                                <div class="col-md-6">
                                    <input type="text" id="t_start" placeholder="Select event time" name="t_start" value="{{ $user->t_start }}">
                                    @error('t_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="e_end"
                                    class="col-md-4 col-form-label text-md-end">{{ __('End of the Event') }}</label>
    
                                <div class="col-md-6">
                                    <input type="date" class="form-control " name="e_end" value="{{ $user->e_end }}">                      
                                    @error('e_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="t_end" class="col-md-4 col-form-label text-md-end">{{ __('End Time') }}</label>
                            
                                <div class="col-md-6">
                                    <input type="text" id="t_end" placeholder="Select event time" name="t_end" value="{{ $user->t_end}}">
                                    @error('t_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="p_num" class="col-md-4 col-form-label text-md-end">{{ __('Expected Number of Participants') }}</label>
    
                                <div class="col-md-6">
                                    <input id="p_num" type="text" class="form-control @error('p_num') is-invalid @enderror " name="p_num" value="{{$user->p_num}}" required>
    
                                    @error('p_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="focal_p" class="col-md-4 col-form-label text-md-end">{{ __('Name of Focal Person (Last name,First Name, MI)') }}</label>
    
                                <div class="col-md-6">
                                    <input id="focal_p" type="text" class="form-control @error('focal_p') is-invalid @enderror " name="focal_p" value="{{$user->focal_p}}" required>
    
                                    @error('focal_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
    
                            <div class="row mb-3">
                                <label for="center" class="col-md-4 col-form-label text-md-end">{{ __('Center') }}</label>
                                <div class="col-md-6">  
                                    <select name="center" id="center" class="form-control" value="{{ $user->center}}">
                                        <option value=" ">Select an option</option>
                                        @foreach(config('unit_options') as $key => $value)
                                        <option value="{{ $key }}" {{$key == $user->center ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    @error('center')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                    </select>                              
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
    
                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror " name="link" value="{{old('link')}}" required>
    
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                                                                   
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($requestButtonText) ? __($requestButtonText) : __('Request') }}
                                    </button>
    
                                    <a type="submit" class="btn btn-primary" href="{{ route('show-virtual-data') }}">{{ __('Show Data') }} </a>                
                                </div>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection