<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
    Route::get('account/password', 'Account\PasswordController@edit')->name('password.edit');
    Route::patch('account/password', 'Account\PasswordController@update')->name('password.edit');
});


// Route::view('watch-the-movie', 'movie')->middleware('verified');
