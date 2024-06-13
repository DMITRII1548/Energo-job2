<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energo-job</title>
    @vite(['resources/css/welcome.css'])
</head>
<body>
    <header>
        <div class="container">
            <div class="header_flex">
                <a href="/"><img src="{{asset ('imgs/welcome/logo.jpg')}}" alt=""></a>
                <nav>
                    <a href="/">Главная</a>
                    <a href="{{ route('profiles.index') }}">Фриланс</a>
                    <a href="{{ route('auth.login') }}">Войти</a>
                    <a href="{{ route('auth.register') }}">Регистрация</a>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="info_message">
                    <div class="text">
                        <h1>Выбирай работу по вкусу и желанию</h1>
                    </div>
                </div>
                <div class="info_message2">
                    <div class="text">
                        <h1>У нас есть курсы для вашего продвижения как для студентов так и для работадателя.</h1>
                    </div>
                </div>
                <div class="more">
                    <a href="{{ route('profiles.index') }}"><button>Подробне...</button></a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>