@if(config('webpay.debug'))
    <code class="response">
        {{ var_export(request()->all()) }}
    </code>
@endif
