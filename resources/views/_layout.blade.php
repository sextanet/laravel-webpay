<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('webpay::_styles')
</head>
<body>
    <header>
        <img src="https://tienda.transbank.cl/assets/images/logo.svg" alt="">
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        Made with ♥️ in <a class="sextanet" href="https://sextanet.com" target="_blank">{{ '<sextanet/>' }}</a>
    </footer>

    <script>
        const buttonsOnce = document.querySelectorAll('.button[once]');

        buttonsOnce.forEach(button => {
            button.addEventListener('click', function () {
                button.innerHTML = 'Wait...';
                button.style.cursor = 'disabled';
                button.style.pointerEvents = 'none';
            });
        });
    </script>
</body>
</html>
