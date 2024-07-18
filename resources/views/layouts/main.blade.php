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
            @if(auth()->user())
            <div>
                <h3>{{ auth()->user()->name }}</h3>
            </div>
            <div style="display: flex; align-items:center; gap: 30px">
                @if (auth()->user()->hasRole('admin'))
                    <div class="auth-button">
                        <a href="{{ route('admin.users.index') }}" class="">Админ панель</a>
                    </div>
                @endif
                <div class="auth-button">
                    <a href="{{ route('profiles.update_or_create') }}" class="">Профиль</a>
                </div>
                <form action="{{ route('auth.logout') }}" method="post" class="header_link">
                    @csrf
                    <button type="submit" class="auth-button">Выйти</button>
                </form>
            </div>

            @else
            <div class="header_link">
                <button class="register-button"><a href="{{ route('auth.register') }}">Регистрация</a></button>
                <button class="auth-button"><a href="{{ route('auth.login') }}">Войти</a></button>
            </div>
            @endif
        </div>

        {{ $slot }}
    </body>
</html>
