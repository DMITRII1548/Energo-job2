<div class="container">
    @assets
        @vite(['resources/css/profile/index.css'])
    @endassets
    <aside>
        <nav>
            <ol>
                <div class="form-group__lang">
                    <div class="dropdown__lang">
                        <button class="dropdown__button__lang">Выберете Профессию</button>
                        <ul class="dropdown__list__lang">
                            @foreach ($parentProfessions as $parentProf )
                                <li wire:click="sortByParentProfession({{ $parentProf->id }})" class="dropdown__list-item__lang" data-value="option">{{ $parentProf->title }}</li>
                            @endforeach
                        </ul>
                        <input type="text" name="select-category" value="" class="dropdown__input-hidden">
                    </div>
                </div>
                <ol class="profession-ol">
                    @foreach($professions as $profession)
                        <li><div wire:click="sortByProfession({{ $profession->id }})" class="nav_btns {{ $activeProfessionId === $profession->id ? ' active' : '' }}">{{ $profession->title }}</div></li>
                    @endforeach
                </ol>
            </ol>
        </nav>
    </aside>

    <div class="cart_container">
        @if($profiles && $profiles->isNotEmpty())
            @foreach($profiles as $profile)
                @if($profile && $profile->user)
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
                            <a href="{{ 'https://wa.me/' . $profile->user->phonenumber }}" target="_blank" class="work-whatstapp">
                                <img src="{{ asset('imgs/profile/index/whatsapp.png') }}" alt="">
                                <span>{{ $profile->user->phonenumber }}</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    
    @vite(['resources/js/dropdown.js'])
</div>
