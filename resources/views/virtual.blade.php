@extends('layouts.master')

@section('content')
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endpush
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($cardName) ? $cardName : __('Virtual Meeting Request') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ $formRoute ?? route('virtual') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="v_event" class="col-md-4 col-form-label text-md-end">{{ __('Title of the Virtual Event') }}</label>

                            <div class="col-md-6">
                                <input id="v_event" type="text" class="form-control @error('v_event') is-invalid @enderror " name="v_event" value="{{old('v_event')}}" required>

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
                                <input type="date" class="form-control " name="e_start" value="{{ old('e_end') }}">                      
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
                                <input type="text" id="t_start" placeholder="Select event time" name="t_start" value="{{ old('t_start') }}">
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
                                <input type="date" class="form-control " name="e_end" value="{{ old('e_end') }}">                      
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
                                <input type="text" id="t_end" placeholder="Select event time" name="t_end" value="{{ old('t_end') }}">
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
                                <input id="p_num" type="text" class="form-control @error('p_num') is-invalid @enderror " name="p_num" value="{{old('p_num')}}" required>

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
                                <input id="focal_p" type="text" class="form-control @error('focal_p') is-invalid @enderror " name="focal_p" value="{{old('focal_p')}}" required>

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
                                <select name="center" id="center" class="form-control">
                                    <option value=" ">Select an option</option>
                                    @foreach(config('unit_options') as $key => $value)
                                    <option value="{{ $key }}" {{old('center')== $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                @error('center')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                </select>                              
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
<script>
    flatpickr("input[name='t_start']", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i K",
        time_24hr: false,
    });

    flatpickr("input[name='t_end']", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i K",
        time_24hr: false,
    });
</script>
@endsection

