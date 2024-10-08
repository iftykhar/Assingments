<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',function(){
    return view('index');
});
Route::get('/login',function(){
    return view('login');
});
Route::get('/profile',function(){
    return view('profile');
});
// Route::get('register',function(){
//     return view('register');
// });
Route::get('register',[AuthController::class,'showregister'])->name('register');
Route::post('register/{user}',[AuthController::class,'register']) ;
Route::get('edit-profile',function(){
    return view('edit-profile');
});
