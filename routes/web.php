<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\SessionController;
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

Route::get('/',[TodolistController::class, 'index'])->middleware(['auth']);

require __DIR__.'/auth.php';

Route::post('/add', [TodolistController::class, 'add']);

Route::post('/update', [TodolistController::class, 'update']);

Route::post('/remove', [TodolistController::class, 'remove']);

/*route::get('/find', [TodolistController::class, 'find']); */

Route::prefix('todo')->group(function(){
    Route::get('/find', [TodolistController::class, 'find']);
    Route::get('/search', [TodolistController::class, 'search']);
    Route::post('/update', [TodolistController::class, 'list_update']);
    Route::post('/remove', [TodolistController::class, 'list_remove']);
});

