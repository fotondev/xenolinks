<?php

use App\Http\Controllers\DuelController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StageController;
use App\Http\Livewire\CheckInSettings;
use App\Http\Livewire\DuelsTable;
use App\Http\Livewire\ParticipantsPage;
use App\Http\Livewire\RegistrationSettings;
use App\Http\Livewire\SettingsPage;
use App\Http\Livewire\ShowBracket;
use App\Http\Livewire\UpdateLogo;
use App\Models\Duel;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('organize')->group(function () {

    

    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    Route::get('/events/{event}', [EventController::class, 'show'])->name('event.organize');

    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');

    Route::post('/events', [EventController::class, 'store'])->name('event.store');

    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');

    Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');

    Route::delete('/events/{event}', [EventController::class, 'delete'])->name('event.delete');




    Route::get('/events/{event}/participants', [ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/events/{event}/participants/create', [ParticipantController::class, 'create'])->name('participant.create');
    Route::post('/events/{event}/participants', [ParticipantController::class, 'store'])->name('participant.store');
    Route::get('/events/{event}/participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('participant.edit');
    Route::put('/events/{event}/participants/{participant}', [ParticipantController::class, 'update'])->name('participant.update');



    Route::get('/events/{event}/duels', [DuelController::class, 'index'])->name('duels.index');




    Route::get('/events/{event}/duels/{duel}', [DuelController::class, 'edit'])->name('duel.edit');


    Route::put('/events/{event}/duels/{duel}', [DuelController::class, 'update'])->name('duel.update');



    Route::get('/events/{event}/settings', SettingsPage::class)->name('settings.index');

    Route::get('/events/{event}/participants/settings', CheckInSettings::class)->name('participant.settings');

    Route::get('/events/{event}/registration/settings', RegistrationSettings::class)->name('registration.settings');
});
