@extends('webpay::_layout')

@section('title', config('webpay.texts.creating.title'))

@section('content')
    {{ config('webpay.texts.creating.content') }}

    <form action="{{ $order->url }}" method="POST" style="display: none;">
        <input type="hidden" name="TBK_TOKEN" value="{{ $order->token }}">

        <button>Redirect</button>
    </form>

    <script>
        document.querySelector('form').submit();
    </script>
@endsection
