<div>
    <form action="#" method="post" wire:submit="resetPassword()">
        <input type="email" wire:model="form.email" placeholder="Email" class="form-control">
        @error('form.email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" wire:model="form.password" placeholder="Password" class="form-control">
        @error('form.password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="password" wire:model="form.password_confirmation" placeholder="Password_confirmation" class="form-control">
        @error('form.password_confirmation')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <button>Изменить пароль</button>
    </form>
</div>
