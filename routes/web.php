<?php

use App\Notifications\taskcompleted;
use App\User;
use Illuminate\Support\Facades\Notification;
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
    // User::find(2)->notify(new taskcompleted);
    $users = user::all();
    Notification::send($users, new taskcompleted());
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
