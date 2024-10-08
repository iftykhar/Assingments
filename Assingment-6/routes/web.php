<?php

use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PageController::class,'index'])->name('home');

Route::get('/about',[PageController::class,'index'])->name('about');

Route::get('/work',[PageController::class,'work'])->name('work');

Route::get('/project',[PageController::class,'project'])->name('project');
