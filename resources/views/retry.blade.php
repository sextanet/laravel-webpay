@extends('webpay::_layout')

@section('title', config('webpay.texts.retry.title'))

@section('content')
    <div>{{ config('webpay.texts.retry.content') }}</div>

    <div class="options">
        @if ($session)
            <a href="{{ route('webpay.session.retry', [$session]) }}">
                Retry
            </a>
        @endif
    </div>

    {{-- <code>
        @dump(request()->all())
    </code> --}}
@endsection
