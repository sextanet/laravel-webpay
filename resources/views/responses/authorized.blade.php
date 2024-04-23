@extends('webpay::partials.layout')

@section('title', 'Authorized')

@section('content')
    <div>This is your authorized page</div>

    <div>You need to change it by using</div>

    <code>
        php artisan vendor:publish --tag=webpay-views
    </code>

    <x-debug/>
@endsection
