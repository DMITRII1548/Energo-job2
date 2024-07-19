<div>
    @assets
        @vite(['resources/css/profile/update_or_create.css'])
    @endassets

       <form class="width" wire:submit="updateOrCreate">
        <div class="background">
            <div class="box">
                <div class="profile">
                    <div>
                        <div class="image" style="position: relative;">
                            @if ($form->avatar)
                                <img src="{{ $form->avatar->temporaryUrl() }}" style="position: absolute; z-index: 2; left: 0;">
                            @endif
                            <img style="opacity: 0;">
                            <img style="z-index: 1; position: absolute; left: 0;" src="{{
                            \App\Models\User::find(auth()->user()->id)->profile
                            && \App\Models\User::find(auth()->user()->id)->profile->avatar
                                ? \App\Models\User::find(auth()->user()->id)->profile->avatarUrl
                                : asset('imgs/profile/avatar.jpg')
                            }}" alt="">
                        </div>
                        <input type="file"  wire:model="form.avatar" id="avatar_paste" class="btn1" style="display: none">
                        <label class="btn1" for="avatar_paste">
                            Вставить изображение
                        </label>
                        @error('form.avatar')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="info">
                        <input wire:model="form.name" type="text" placeholder="ФИО" name="Full-name">
                        @error('form.name')
                            <p>{{ $message }}</p>
                            @enderror
                        <input wire:model="form.phonenumber" type="tel" placeholder="Номер" name="Full-name" required>
                        @error('form.phonenumber')
                            <p>{{ $message }}</p>
                        @enderror
                        <input wire:model="form.expirience" type="text" placeholder="Опыт работы" name="Full-name" required>
                        @error('form.expirience')
                            <p>{{ $message }}</p>
                        @enderror
                        <input wire:model="form.portfolio" type="url" placeholder="Ссылка на портфолио ( если есть )" name="Full-name">
                        @error('form.portfolio')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="professions">
                    <!-- Add product with livewire dont forget -->
                    <div class="padding">
                        <div class="cards" id="proffesions">
                            <a>Профессии:</a>
                            @foreach ($selectedProfessions as $profession)
                                <span wire:click="destroyProfession({{ $profession->id }})" class="card"> {{ $profession->title }} <div class="cross"></div> </span>
                            @endforeach
                            <!-- <span class="card">Test <div class="cross"></div> </span> -->
                        </div>

                        <label for="professions" class="btn3 btn-label">Добавить</label>
                        <select id="professions" name="professions[]" class="btn2" wire:model="profession" wire:change="addProfession">
                            <option id="selectDefProf" disabled selected>Добавить</option>
                            @foreach ($professions as $profession)
                                <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('form.professions')
                    <p>{{ $message }}</p>
                @enderror

                <div class="gallery">
                    <label for="gallery">Загрузите фото ваших дипломов и сертификатов подтверждающих вашу квалификацию:</label><br>
                    <input type="file" id="gallery" wire:model="gallery" accept="image/*" multiple>
                </div>

                <div class="galleries">
                    @if ($galleries)
                        @foreach ($galleries as $gallery)
                        <div class="galleries__img">
                            <img src="{{ $gallery->imageSrc }}">
                            <div class="cross-gal" wire:click="destroyGallery({{ $gallery->id }})">

                            </div>
                        </div>

                        @endforeach
                    @endif
                </div>

                @if($isCreatedOrUpdated)
                    <p>Ваш профиль сохранен</p>
                @endif
                <div class="confirm">
                    <button type="submit" class="btn4">подтвердить</button>
                </div>
            </div>
        </div>
</form>
</div>
