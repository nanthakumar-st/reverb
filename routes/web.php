<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('todo');
});

Route::resource('cities', CityController::class);
