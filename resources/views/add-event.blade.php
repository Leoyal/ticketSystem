@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="{{ $formRoute ?? route('add-new-event') }}">
            @include('virtual', ['cardName' => 'Add New Event','requestButtonText' => 'Add','formRoute' => route('add-new-event')]) {{-- Include the registration form --}}      
        </form>
        </div>
@endsection
