@extends('webpay::partials.layout')

@section('title', 'Rejected')

@section('content')
    <div>Your transaction was rejected</div>

    <div class="options">
        <a class="button" href="{{ route('webpay.create') }}" once>
            Retry
        </a>
    </div>

    <x-debug/>
@endsection
