@extends('webpay::partials.layout')

@section('title', 'Operation cancelled')

@section('content')
    <div>
        Operation cancelled. Please try again
    </div>

    {{-- <div class="options">
        <a class="button" href="{{ route('webpay.session.retry', $session) }}" once>
            Go back
        </a>
    </div> --}}

    <x-webpay-debug/>
@endsection
