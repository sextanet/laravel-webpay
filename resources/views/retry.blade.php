@extends('webpay::_layout')

@section('title', config('webpay.texts.retry.title'))

@section('content')
    <div>{{ config('webpay.texts.retry.content') }}</div>

    <div class="options">
        @if ($buy_order)
            <a href="{{ route('webpay.retry', [$buy_order]) }}">
                Retry
            </a>
        @endif
    </div>

    {{-- <code>
        @dump(request()->all())
    </code> --}}
@endsection
