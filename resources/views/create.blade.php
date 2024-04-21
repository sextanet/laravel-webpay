<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('webpay.texts.creating.title') }}</title>
    <style>
        * {
            margin: 0;
            font-family: "Arial", sans-serif;
            font-weight: 400;
            font-style: normal;
            color: #666;
            letter-spacing: 1px;
        }
        
        header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            position: fixed;
            width: 100%;
            height: 100px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://tienda.transbank.cl/assets/images/logo.svg" alt="">
    </header>
    <main>
        {{ config('webpay.texts.creating.content') }}
    </main>

    <form action="{{ $response->getUrl() }}" method="POST" style="display: none;">
        <input type="hidden" name="TBK_TOKEN" value="{{ $response->getToken() }}">

        <button>Crear orden en Transbank</button>
    </form>

    <script>
        {{-- document.querySelector('form').submit(); --}}
    </script>
</body>
</html>
