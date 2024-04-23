@extends('webpay::_layout')

@section('title', 'Rejected')

@section('content')
    <div>This is your rejected page</div>

    <div>You need to change it by using</div>

    <code>
        php artisan vendor:publish --tag=webpay-views
    </code>

    <x-debug/>
@endsection
