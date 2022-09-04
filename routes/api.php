<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\todoconteoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::get('/hello', function() {
    return 'hello world';
});    

route::get('/hello-game', function() {
    return 'hello game';
});    
// Route::post('/login2', [AuthController::class, 'login_2']);
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'signin']);

Route::post('/token', [AuthController::class, 'login_2']);

route::group(['middleware' =>['auth:sanctum']], function(){
    route::get('/todo',[todoconteoller::class,'index']);
    route::get('/todo/{id}',[todoconteoller::class,'show']);
    route::post('/todo',[todoconteoller::class,'store']);
    route::put('/todo/{id}',[todoconteoller::class,'update']);
    route::delete('/todo/{id}',[todoconteoller::class,'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
