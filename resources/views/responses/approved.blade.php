@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
<div>This is your <span class="approved">approved</span> page</div>

<div>You need to implement your custom logic by doing</div>

<pre>
// YourOrderModel.php

public function markAsPaidWithWebpay()
{
    // 😎 Your custom logic, for example:

    $order = $this->webpay_order;
    $responses = $this->webpay_responses;

    return view('custom_view');
}
</pre>

<div>
    Click
    <span class="toggle">here to toggle relevant fields</span>
</div>

<pre class="hidden">
- Id: {{ $latest_response->id }} (be careful with many responses)
- Status: {{ $latest_response->status }}
- VCI: {{ $latest_response->vci }}
- VCI (description): {{ $latest_response->vci->getDescription() }}
- Amount: {{ $latest_response->amount }}
- Authorization Code: {{ $latest_response->authorization_code }}
- Payment Type Code: {{ $latest_response->payment_type_code }}
- Payment Type Code (description): {{ $latest_response->payment_type_code->getDescription() }}
- Card number: {{ $latest_response->card_number }}
</pre>

<x-webpay-debug/>
@endsection
