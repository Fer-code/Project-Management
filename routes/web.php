<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Projects\ProjectsList;
use App\Livewire\Pages\Projects\ProjectCreate;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/projects', ProjectsList::class )->middleware(['auth', 'verified'])->name('projects');
    Route::get('/project-create', ProjectCreate::class )->middleware(['auth', 'verified'])->name('project-create');

});
