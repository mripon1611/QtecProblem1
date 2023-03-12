<?php

use App\Http\Controllers\SearchHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[SearchHistoryController::class,'index'])->name('search-history.index');

Route::resource('search-history',SearchHistoryController::class);
