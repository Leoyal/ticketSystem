@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="{{ $formRoute ?? route('add-new-user') }}">
            @include('auth.register', ['cardName' => 'Add New User','registerButtonText' => 'Add','formRoute' => route('add-new-user')]) {{-- Include the registration form --}}      
        </form>
        </div>
@endsection
