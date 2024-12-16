<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/send-email', function () {
    return view('send.page');
});

Route::get('/email-page', function () {
    return view('recieve.page', [
        "appName" => config('app.name'),
        "subject" => 'Route Mailing',
        "body" => 'message from route has been sent!!',
        "contactAddress" => 'https://laracasts.com'
    ]);
});

Route::post('/send', [WebController::class, 'sendEmail'])->name('sendEmail');
