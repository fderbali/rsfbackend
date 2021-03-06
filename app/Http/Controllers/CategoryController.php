<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(categoryRequest $categoryRequest) {

        if(Category::create($categoryRequest->all())) {
            return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }

    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }

    public function delete(Category $category) {
        $category->delete();
        return response()->json(["success"=>true]);
    }

    public function update(categoryRequest $categoryRequest, Category $category){
        $category->update($categoryRequest->all());
        return response()->json(["success"=>true]);
    }

    public function show(Category $category) {
        return response()->json($category);
    }

}
