@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
<div>This is your approved page</div>

<div>You need to implement your custom logic by doing</div>

<pre>
// YouModel.php

public function markAsPaidWithWebpay()
{
    // Your custom logic
}
</pre>

<x-webpay-debug/>
@endsection
