<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('profile')->group(function () {
    Route::get('/display', [ProfilesController::class, 'index']);
    Route::get('/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
    Route::patch('/{user}', [ProfilesController::class, 'update'])->name('profile.update');
});

Route::prefix('groups')->group(function () {
    Route::get('/list', [GroupsController::class, 'users']);
    Route::get('/join', [GroupsController::class, 'index']);
    Route::get('/create', [GroupsController::class, 'create']);
    Route::post('/', [GroupsController::class, 'store']);
    Route::get('/add/{group}', [GroupsController::class, 'addUser']);
    Route::get('/show/{group}', [GroupsController::class, 'show']);
    Route::get('/edit/{group}', [GroupsController::class, 'edit']);
    Route::patch('/{group}', [GroupsController::class, 'update']);
});

Route::prefix('calendar')->group(function() {
    Route::get('/', [CalendarController::class, 'index']);
    Route::post('/action', [CalendarController::class, 'action']);
});
