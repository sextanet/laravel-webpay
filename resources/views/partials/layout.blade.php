<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('webpay::partials.styles')
</head>
<body>
    <header>
        <img src="https://tienda.transbank.cl/assets/images/logo.svg" alt="">
    </header>
    
    <main>
        @yield('content')

        <div class="give-us-a-star">
            <div class="content">
                <div>
                    <div class="question">Did it help you?</div>
                    <div class="description">
                        <div>This is a <span class="open-source">Open Source</span> package</div>
                        <div>Give us a star on GitHub! ⭐️</div>
                    </div>
                </div>
                <div class="star">
                    <a href="https://github.com/sextanet/laravel-webpay" target="_blank">
                        <img src="https://img.shields.io/github/stars/sextanet/laravel-webpay?style=social" alt="GitHub stars">
                    </a>
                </div>

                <div class="buttons">
                    <button class="small" id="close_give_star">Close</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        Made with ♥️ in <a class="sextanet" href="https://sextanet.com/?service=laravel-webpay" target="_blank">{{ '<sextanet/>' }}</a>
    </footer>

    @include('webpay::partials.scripts')
</body>
</html>
