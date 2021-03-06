<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\PostsContoller;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ReportController;
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
    Route::get('/show/{user}', [ProfilesController::class, 'show']);
    Route::get('/groups/{industry}', [ProfilesController::class, 'groups']);
});

Route::get('/people', [ProfilesController::class, 'people']);

Route::prefix('groups')->group(function () {
    Route::get('/index', [GroupsController::class, 'index']);
    Route::get('/create', [GroupsController::class, 'create']);
    Route::post('/', [GroupsController::class, 'store']);
    Route::get('/add/{group}', [GroupsController::class, 'addUser']);
    Route::get('/show/{group}', [GroupsController::class, 'show']);
    Route::get('/edit/{group}', [GroupsController::class, 'edit']);
    Route::patch('/{group}', [GroupsController::class, 'update']);
    Route::get('/delete/{group}', [GroupsController::class, 'destroy']);
    Route::get('/leave/{group}', [GroupsController::class, 'leave']);
    Route::get('/members/{group}', [GroupsController::class, 'members']);
});

Route::prefix('calendar')->group(function() {
    Route::get('/', [CalendarController::class, 'index']);
    Route::get('/create/{group}', [CalendarController::class, 'create']);
    Route::post('/', [CalendarController::class, 'store']);
    Route::post('/action', [CalendarController::class, 'action']);
});

Route::prefix('posts')->group(function() {
    Route::get('/create/{group}', [PostsContoller::class, 'create']);
    Route::post('/', [PostsContoller::class, 'store']);
    Route::get('/delete/{post}', [PostsContoller::class, 'destroy']);
    Route::get('/edit/{post}', [PostsContoller::class, 'edit']);
    Route::patch('/{post}', [PostsContoller::class, 'update']);
});

Route::prefix('report')->group(function() {
    Route::get('/create/{post}', [ReportController::class, 'create']);
    Route::post('/', [ReportController::class, 'store']);
    Route::get('/index', [ReportController::class, 'index']);
});

Route::post('/reply/{post}', [RepliesController::class, 'store']);

Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
