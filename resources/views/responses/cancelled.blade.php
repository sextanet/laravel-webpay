@extends('webpay::partials.layout')

@section('title', 'Operation cancelled')

@section('content')
<div>This is the default <span class="cancelled">cancelled</span> endpoint</div>

<div>Operation cancelled. Please try again</div>

<div>Implement your custom logic by specifying before payWithWebpay() method</div>

<pre data-comment="Add this line before $order->payWithWebpay()">
LaravelWebpay::setCancelledUrl(route('cancelled')); // 👈 Set your custom route
</pre>

{{-- <div class="options">
    <a class="button" href="{{ route('webpay.session.retry', $session) }}" once>
        Go back
    </a>
</div> --}}

<x-webpay-debug/>
@endsection
