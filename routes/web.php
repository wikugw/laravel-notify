<?php

use App\Notifications\taskcompleted;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

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
    // $when = Carbon::now()->addSeconds(10);
    $user = user::find(2);
    // User::find(2)->notify((new taskcompleted)->delay($when));
    // Notification::send($users, new taskcompleted());
    Notification::route('mail', 'taylor@example.com')
        // ->route('nexmo', '5555555555')
        // ->route('slack', 'https://hooks.slack.com/services/...')
        ->notify(new taskcompleted($user));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
