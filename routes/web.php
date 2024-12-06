<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [BlogController::class,'index']);
Route:: get('/blogs/{blog:slug}', [BlogController::class,'show']);

Route::get('/register', [AuthController::class,'create']);
Route::post('/register',[AuthController::class,'store']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/login', [AuthController::class,'login']);
Route::post('/login',[AuthController::class,'post_login']);
