<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
USE App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::prefix('users')->group(function () {
    Route::post('/acceso', [UserController::class, 'acceso'])->name('users.acceso');
    //
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    //
    Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('users.logout');
    Route::get('/list', [UserController::class, 'index'])->middleware('auth')->name('users.list');
    //
    Route::post('/update/{user}', [UserController::class, 'update'])->middleware('auth')->name('users.update');
    Route::post('/destroy/{user}', [UserController::class, 'destroy'])->middleware('auth')->name('users.destroy');
    //
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'create'])->name('users.create');
});

Route::controller(QuestionController::class)->middleware('auth')->group(function () {
    Route::get('members', 'index')->name('questionUser.list');
    Route::get('members-list/{question?}', 'show')->name('itemsQuestion.show');
    Route::post('members/update/{question}', 'update')->name('questions.update');
    Route::post('members/destroy/{question}', 'destroy')->name('questions.destroy');
});

Route::controller(ItemController::class)->middleware('auth')->group(function () {
    Route::post('members-list', 'store')->name('itemQuestion.store');
    Route::post('members-list/update/{item}', 'update')->name('itemQuestion.update');
    Route::post('members-list/destroy/{item}', 'destroy')->name('itemQuestion.destroy');
    Route::get('tip/{question?}', 'tip')->name('questionTip.tip');
});

Route::fallback(function () {
    return redirect()->route('home');
});
