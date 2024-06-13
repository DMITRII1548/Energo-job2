<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/email/verify', function () {
    return redirect()->route('profiles.index');
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('profiles.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function () {
    Auth::logout();

    return redirect()->route('auth.login');
})
    ->middleware('auth')
    ->name('auth.logout');

Route::prefix('auth')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)
        ->middleware('guest')
        ->name('auth.login');

    Route::get('/register', \App\Livewire\Auth\Register::class)
        ->middleware('guest')
        ->name('auth.register');

    Route::get('/profile', \App\Livewire\Auth\Profile::class)
        ->middleware(['auth'])
        ->name('auth.profile');

    Route::get('/forgot-password', \App\Livewire\Auth\ForgotPassword::class)
        ->middleware('guest')
        ->name('password.request');

    Route::get('/reset-password/{token}', \App\Livewire\Auth\ResetPassword::class)
        ->middleware('guest')
        ->name('password.reset');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', \App\Livewire\Admin\User\Index::class)->name('admin.users.index');
    });

    Route::prefix('skills')->group(function () {
        Route::get('/', \App\Livewire\Admin\Skill\Index::class)->name('admin.skills.index');
        Route::get('/create', \App\Livewire\Admin\Skill\Create::class)->name('admin.skills.create');
        Route::get('/{skill}/edit', \App\Livewire\Admin\Skill\Edit::class)->name('admin.skills.edit');
    });

    Route::prefix('professions')->group(function () {
        Route::get('/', \App\Livewire\Admin\Profession\Index::class)->name('admin.professions.index');
        Route::get('/create', \App\Livewire\Admin\Profession\Create::class)->name('admin.professions.create');
        Route::get('/{profession}/edit', \App\Livewire\Admin\Profession\Edit::class)->name('admin.professions.edit');
    });
});

Route::prefix('profiles')->group(function () {
    Route::get('/update_or_create', \App\Livewire\Profile\UpdateOrCreate::class)
        ->middleware(['auth'])
        ->name('profiles.update_or_create');

    Route::get('/', \App\Livewire\Profile\Index::class)
        ->name('profiles.index');
});

