<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [BlogController::class,'index']);
Route:: get('/blogs/{blog:slug}', [BlogController::class,'show']);


