@extends('webpay::partials.layout')

@section('title', 'Approved')

@section('content')
<div>This is your <span class="approved">approved</span> endpoint</div>

<div>Implement your custom logic by overriding the method</div>

<pre class="yourModel" data-comment="YourModel.php">
public function markAsPaidWithWebpay()
{
    // 😎 Write here your cool logic

    // Available data:

    $order = $this->webpay_order;
    $responses = $this->webpay_responses;
    $latest_response = $this->latest_response;


    // And then, return a view or redirect to another route

    return view('custom_view');
}
</pre>

<div>
    Click or touch to see
    <span class="toggle"> $latest_response</span>
</div>

<pre class="hidden">
$latest_response
  ->id = {{ $latest_response->id }} // 🚨 be careful with many responses
  ->status = {{ $latest_response->status }}
  ->status->getDescription() = {{ $latest_response->status->getDescription() }}
  ->vci = {{ $latest_response->vci }}
  ->vci->getDescription() = {{ $latest_response->vci->getDescription() }}
  ->amount = {{ $latest_response->amount }}
  ->authorization_code = {{ $latest_response->authorization_code }}
  ->payment_type_code = {{ $latest_response->payment_type_code }}
  ->payment_type_code->getDescription() = {{ $latest_response->payment_type_code->getDescription() }}
  ->card_number = {{ $latest_response->card_number }}
</pre>

<x-webpay-debug/>
@endsection
