@extends('webpay::partials.layout')

@section('title', 'Operation canceled')

@section('content')
    <div>
        Response canceled. Please try again
    </div>

    <div class="options">
        <a class="button" href="{{ route('webpay.create') }}" once>
            Retry
        </a>
    </div>

    <x-webpay-debug/>
@endsection
