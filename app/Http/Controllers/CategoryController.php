<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category) {
        return view('blogs',[
            'blogs'=>$category->blogs,
            'currentCategory'=>$category,
            'categories'=>Category::all()
        ]);
    }
}
