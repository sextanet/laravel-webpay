@extends('webpay::_layout')

@section('title', 'Token WS not provided')

@section('content')
    <div>
        Token WS not provided. Please try again
    </div>

    <div class="options">
        <a class="button" href="{{ route('webpay.create') }}" once>
            Retry
        </a>
    </div>

    <x-debug/>
@endsection
