<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="{{ asset('imgs/logo.png') }}">
        <title>Energo job</title>
    </head>
    <body>
        <div class="header">
            <a href="{{ route('profiles.index') }}" class="header_logo">
                <img src="{{ asset('/imgs/logo.png') }}" class="logo_img">
            </a>
            <button class="auth-button"><a href="{{ route('profiles.index') }}">На главную</a></button>
        </div>

        {{ $slot }}
    </body>
</html>
