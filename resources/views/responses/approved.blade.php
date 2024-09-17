@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
<div>This is your <span class="approved">approved</span> page</div>

<div>You need to implement your custom logic by doing</div>

<pre>
// YourOrderModel.php

public function markAsPaidWithWebpay()
{
    // 😎 Your custom logic here

    return view('custom_view');
}
</pre>

<x-webpay-debug/>
@endsection
