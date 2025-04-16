<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('tasks', \App\Livewire\Tasks\Index::class)->name('tasks.index');
Route::get('tasks/create', \App\Livewire\Tasks\Create::class)->name('tasks.create');
Route::get('tasks/edit/{task}', \App\Livewire\Tasks\Edit::class)->name('tasks.edit');

Route::get('projects', \App\Livewire\Projects\ProjectIndex::class)->name('projects.index');
Route::get('projects/create', \App\Livewire\Projects\ProjectCreate::class)->name('projects.create');
Route::get('projects/edit/{project}', \App\Livewire\Projects\ProjectEdit::class)->name('projects.edit');

require __DIR__ . '/auth.php';
