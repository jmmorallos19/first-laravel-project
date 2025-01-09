<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;

Route::get('/', function () {
    return view('welcome');
});

// To show all data
Route::get('/members', [MembersController::class, 'index'])->name('members.index');

// To Create new member page
Route::get('/members/create', [MembersController::class, 'create'])->name('members.create');

// To show specific member
Route::get('/members/{member}', [MembersController::class, 'show'])->name('members.show');

// To Create new member form
Route::post('/members', [MembersController::class, 'store'])->name('members.store');

//To Delete specific member
Route::delete('/members/{member}', [MembersController::class, 'destroy'])->name('members.destroy');
