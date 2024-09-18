@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
<div>This is your <span class="approved">approved</span> page</div>
<div>
    Click
    <span style="text-decoration: underline; text-underline-offset: 5px; cursor: pointer;">here to toggle relevant fields</span>
</div>

<pre class="hidden">
- Id: {{ $latest_response->id }} (be careful with many responses)
- Status: {{ $latest_response->status }}
- VCI: {{ $latest_response->vci }}
- Amount: {{ $latest_response->amount }}
- Authorization Code: {{ $latest_response->authorization_code }}
- Payment Type Code: {{ $latest_response->payment_type_code }}
- Card number: {{ $latest_response->card_number }}
</pre>

<div>You need to implement your custom logic by doing</div>

<pre>
// YourOrderModel.php

public function markAsPaidWithWebpay()
{
    // 😎 Your custom logic
    
    // Here you may show the success message, for example:


    /* You can access to: */
    $order = $this->webpay_order;
    $responses = $this->webpay_responses;

    return view('custom_view');
}
</pre>

<x-webpay-debug/>
@endsection
