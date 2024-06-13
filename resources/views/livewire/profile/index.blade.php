<div class="container">
    @assets
        @vite(['resources/css/profile/index.css'])
    @endassets
    <aside>
        <nav>
            <ol>
                @foreach($professions as $profession)
                    <li><a wire:click="sortByProfession({{ $profession->id }})" class="nav_btns {{ $activeProfessionId === $profession->id ? ' active' : '' }}">{{ $profession->title }}</a></li>
            
                @endforeach
                <div class="form-group__lang">
                    <div class="dropdown__lang">
                        <button class="dropdown__button__lang">Проф</button>
                        <ul class="dropdown__list__lang">
                            <li class="dropdown__list-item__lang" data-value="option">Элекрик</li>
                            <li class="dropdown__list-item__lang" data-value="option">Монтажник</li>
                            <li class="dropdown__list-item__lang" data-value="option">Строитель</li>
                            <li class="dropdown__list-item__lang" data-value="option">Давка</li>
                        </ul>
                        <input type="text" name="select-category" value="" class="dropdown__input-hidden">
                    </div>
                </div>
                <ol class="profession-ol">
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                    <li><div class="dropdown_card_profession"><h3>Электрик</h3></div></li>
                </ol>
            </ol>
        </nav>
    </aside>

    <div class="cart_container">
        @foreach($profiles as $profile)
            <div class="cart">
                <div class="cart-top">
                    <img src="{{ !$profile->avatar ? asset('/imgs/profile/avatar.jpg') : $profile->avatarUrl }}" alt="" class="cart-img">
                    <ul class="cart-list">
                        <li class="cart-item">{{ $profile->user->name }}</li>
                        <li class="cart-item">Опыт работы : {{ $profile->expirience }}</li>
                        <li class="cart-item">Навыки : @foreach($profile->skills as $skill) {{ $skill->title . ' ' }} @endforeach</li>
                    </ul>
                </div>
                <div class="cart-bottom">
                    <a target="_blank" href="{{ $profile->portfolio }}" class="work-link">Список работ</a>
                    <a href="{{ auth()->user() ? ('https://wa.me/' . $profile->user->phonenumber) : route('auth.login') }}" target="_blank" class="work-whatstapp">
                        <img src="{{ asset('imgs/profile/index/whatsapp.png') }}" alt="">
                        <span>{{ $profile->user->phonenumber }}</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    @vite(['resources/js/dropdown.js'])
</div>
