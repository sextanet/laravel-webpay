@extends('webpay::partials.layout')

@section('title', config('webpay.texts.retry.title'))

@section('content')
    <div>{{ config('webpay.texts.retry.content') }}</div>

    <div class="options">
        @isset ($session)
            <a href="{{ route('webpay.session.retry', [$session]) }}">
                Retry
            </a>
        @endisset
    </div>

    <x-webpay-debug/>
@endsection
