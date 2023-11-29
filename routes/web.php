<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TaskController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/db:seed', function () {
    Artisan::call('db:seed');


    return "Db Seed successfully";
 });

Route::resource('tasks', TaskController::class);
Route::get('changeStatus', [TaskController::class,'changeStatus'])->name('changeStatus');

