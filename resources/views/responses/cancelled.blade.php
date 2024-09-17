@extends('webpay::partials.layout')

@section('title', 'Operation cancelled')

@section('content')
    <div>
        Response cancelled. Please try again
    </div>

    <div class="options">
        <a class="button" href="{{ route('webpay.create') }}" once>
            Retry
        </a>
    </div>

    <x-webpay-debug/>
@endsection
