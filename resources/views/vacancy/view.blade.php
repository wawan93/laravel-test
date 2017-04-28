@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>{{ $vacancy->name }}</h1>
                <div>
                    {{ $vacancy->text }}
                </div>
                <p>{{ $vacancy->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('vacancy.approve_button')
            </div>
        </div>
    </div>
@endsection