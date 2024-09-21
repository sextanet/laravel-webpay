@extends('webpay::partials.layout')

@section('title', 'Rejected')

@section('content')
    <div>Your transaction was <span class="rejected">rejected</span></div>

    {{-- <div class="options">
        <a class="button" href="{{ route('webpay.create') }}" once>
            Retry
        </a>
    </div> --}}

    <x-webpay-debug/>
@endsection
