<div>
    @assets
        @vite(['resources/css/profile/profile-page.css'])
    @endassets
    <section class="container" style="margin-top: 150px">
        <div class="cart">
            <div class="cart_flex">
                <div class="avatarka">
                    <img src="{{ !$profile->avatar ? asset('/imgs/profile/avatar.jpg') : $profile->avatarUrl }}" alt="">
                </div>
                <div class="profile-info">
                    <div class="cart_name">
                        <h1>{{ $profile->user->name }}</h1>
                    </div>
                    <div class="cart_number">
                        <label><h2>Номер телефона:</h2></label><h3>{{ $profile->user->phonenumber }}</h3>
                    </div>
                    <div class="cart_profisia">
                        <label><h2>Профиссия:</h2></label><h1>
                            @foreach ($profile->professions as $prof)
                                {{ $prof->title . ' ' }}
                            @endforeach
                        </h1>
                    </div>
                    <div class="cart_description">
                        <p>Опыт: {{ $profile->expirience }}</p>
                    </div>
                </div>
            </div>
            <div class="cart_diplom">
                @if ($profile->galleries)
                    @foreach ($profile->galleries as $gallery)
                        <img class="sertifikat" src="{{ $gallery->imageSrc }}">
                    @endforeach
                @endif
            </div>
        </div>
    </section>

</div>
