<div>
@assets
    @vite(['resources/css/auth/login.css'])
@endassets
<div class="bg">
    <div id="baner" class="none">
        <div class="aba">
            <div>
                <a>Если у вас есть профиль, то войдите</a>
            </div>
            <div class="btn7">
                <button id="btn8">Войти</button>
            </div>
            <div>
                <div class="btn11">
                    <a href="{{ route('profiles.index') }}" id="btn12">На главную</a>
                </div>
            </div>

        </div>
    </div>
    <div id="baner2">
        <div class="aba">
            <div>
                <a>Если у вас нет профиля, то зарегистрируйтесь</a>
            </div>
            <div class="btn9">
                <button wire:click="register" id="btn10">Зарегистрироваться</button>
            </div>
            <div>
                <div class="btn11">
                    <a href="{{ route('profiles.index') }}" id="btn12">На главную</a>
                </div>
            </div>
        </div>
    </div>
        <div class="log">
            <form class="log1" wire:submit="login">
                <h1>Войти</h1>
                <div class="inputBox">
                    <input type="email" required="required" class="qwerty" wire:model="form.email">
                    <span class="qwe">Почта</span>
                </div>
                <p class="danger">Ошибка</p>
                <div class="inputBox">
                    <input type="password" required="required" wire:model="form.password">
                    <span>Пароль</span>
                </div>
                <p class="danger">Ошибка</p>

                <div class="btn">
                    <button type="submit" class="btn1">Войти</button>
                </div>
            </form>
        </div>
        <form class="reg" wire:submit="register">
            <div class="reg1">
                <h1>Регистрация</h1>
                <div class="inputBox">
                    <input type="text" required="required" wire:model="form.name">
                    <span>Имя, Фамилия</span>
                </div>
                <div class="inputBox">
                    <input type="email" required="required" wire:model="form.email">
                    <span>Почта</span>
                </div>
                <div class="inputBox">
                    <input type="tel" required="required" wire:model="form.phonenumber">
                    <span>Телефон</span>
                </div>
                <div class="inputBox">
                    <input type="password" required="required" wire:model="form.password">
                    <span>Пароль</span>
                </div>
                <div class="inputBox">
                    <input type="password" required="required" wire:model="form.password_confirmation">
                    <span>Подтвердить</span>
                </div>
                <div class="btn2">
                    <button class="btn3" type="submit">Регистрация</button>
                </div>
            </div>
        </form>
    </div>
</div>
