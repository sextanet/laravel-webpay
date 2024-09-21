@extends('webpay::partials.layout')

@section('title', 'Rejected')

@section('content')
<div>This is the default <span class="rejected">rejected</span> endpoint</div>

<div>Operation rejected. Please try again</div>


<div>Implement your custom logic by specifying before payWithWebpay() method</div>

<pre data-comment="Add this line before $order->payWithWebpay()">
LaravelWebpay::setRejectedUrl(route('cancelled')); // 👈 Set your custom route
</pre>

{{-- <div class="options">
    <a class="button" href="{{ route('webpay.create') }}" once>
        Retry
    </a>
</div> --}}

<x-webpay-debug/>
@endsection
