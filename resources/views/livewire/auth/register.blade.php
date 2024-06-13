<div>
    @assets
        @vite(['resources/css/auth/register.css'])
    @endassets
<div class="bg">
    <div id="baner">
        <div class="aba">
            <div>
                <a>Если у вас есть профиль, то войдите</a>
            </div>  
            <div class="btn7">
                <button wire:click="login" id="btn8">Войти</button>
            </div>
            <div>
                <div class="btn11">
                    <a href="{{ route('profiles.index') }}" id="btn12">На главную</a>
                </div>
            </div>
            
        </div>
    </div>
    <div id="baner2" class="none">
        <div class="aba">
            <div>
                <a>Если у вас есть профиль, то войдите</a>
            </div>  
            <div class="btn9">
                <button id="btn10">Зарегистривоваться</button>
            </div>
            <div>
                <div class="btn11">
                    <a href="./main.html" id="btn12">На главную</a>
                </div>
            </div>
        </div>
    </div>
        <div class="log">
            <div class="log1">
                <h1>Войти</h1>
                <div class="inputBox">
                    <input type="text" required="required" class="qwerty">
                    <span class="qwe">Почта</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required">
                    <span>Пароль</span>
                </div>
                <div class="btn">
                    <button class="btn1">Войти</button>
                </div>
            </div>
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
