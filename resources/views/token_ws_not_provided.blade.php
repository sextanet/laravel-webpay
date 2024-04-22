@extends('webpay::_layout')

@section('title', 'Token WS not provided')

@section('content')
    <div>Token WS not provided. Please try again</div>

    <div class="options">
        <a class="button" href="{{ route('webpay.create') }}">
            Retry
        </a>
    </div>

    <code>
        @dump(request()->all())
    </code>
@endsection
