<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        :root {
            --primary: #d5006c;
            --primary-hover: #b0035b;
        }

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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            gap: 20px;
        }

        .options {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a {
            text-decoration: none;
        }

        .button {
            background: var(--primary);
            color: #fff;
            padding: 10px 30px;
            border-radius: 10px;
            transition: filter 200ms;
            font-weight: 600;
        }

        .button:hover {
            background: var(--primary-hover);
        }

        code {
            background: #000;
            color: #fff;
            padding: 30px;
            width: 80%;
            border-radius: 10px;
            overflow: scroll;
            font-family: "Courier New", monospace;
            font-size: .8rem;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://tienda.transbank.cl/assets/images/logo.svg" alt="">
    </header>
    <main>
        @yield('content')
    </main>

    <script>
        {{-- document.querySelector('form').submit(); --}}
    </script>
</body>
</html>
