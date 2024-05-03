<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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
/*
Route::get('/', function () {
    //return view('welcome');
});
*/

#로그인 상태에 로그인페이지 또는 회원가입 페이지 접근 막기
Route::middleware(['already'])->group(function(){
    Route::match(['get','post'], '/', [LoginController::class, 'login'])                ->name('login');
    Route::match(['post'], '/loginAction', [LoginController::class, 'loginAction'])     ->name('loginAction');
    Route::match(['get','post'], '/joinForm', [LoginController::class, 'joinForm'])     ->name('joinForm');
    Route::match(['post'], '/joinAction', [LoginController::class, 'joinAction'])       ->name('joinAction');
});


#비로그인시 페이지 접근 막기
Route::middleware(['login'])->group(function(){
    Route::match(['get','post'], '/main', [MainController::class, 'main'])              ->name('main');
    Route::match(['get','post'], '/logout', [LoginController::class, 'logout'])         ->name('logout');
});
