@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
    <div>This is your approved page</div>

    <div>You need to change it by using</div>

    <code>
        php artisan vendor:publish --tag=webpay-views
    </code>

    <x-webpay-debug/>
@endsection
