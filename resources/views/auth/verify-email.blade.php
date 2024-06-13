<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('imgs/logo.png') }}">
    @vite(['resources/css/auth/verify-email.css'])
    <title>Energo job</title>
</head>
<body>
    <div class="card">
        <form class="promo" action="{{ route('verification.send') }}" method="post">
            <h1>Подтвердите почту</h1> 
            <h3>Мы отправили письмо вам на почту</h3>
            <h6>Не прошило письмо?</h6><br>

            @csrf
            <button type="submit">Отправить ещё раз</button>
        </form>
    </div>
</body>
</html>