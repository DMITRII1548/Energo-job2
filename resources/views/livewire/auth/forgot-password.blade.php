<div>
    <form class="form-group" wire:submit="forgot" class="form-control">
        <input type="email" wire:model="form.email" placeholder="Email" class="form-control">
        @error('form.email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        @if($status)
            <div>{{$status}}</div>
        @endif
        <button type="submit" class="btn btn-success">Сбросить пароль</button>
    </form>
</div>
