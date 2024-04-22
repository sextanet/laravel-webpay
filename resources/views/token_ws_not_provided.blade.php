@extends('webpay::_layout')

@section('title', 'Token WS not provided')

@section('content')
    <div>Token WS not provided. Please try again</div>

    <code>
        @dump(request()->all())
    </code>
@endsection
