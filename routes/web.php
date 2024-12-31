<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [BlogController::class,'index']);
Route:: get('/blogs/{blog:slug}', [BlogController::class,'show']);
Route::post('/blogs/{blog:slug}/subscribe',[BlogController::class,'subHandler']);

Route::get('/register', [AuthController::class,'create']);
Route::post('/register',[AuthController::class,'store']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login']);

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
