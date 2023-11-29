<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TaskController;



Route::get('/', function () {
    return view('welcome');
});



Route::resource('tasks', TaskController::class);
