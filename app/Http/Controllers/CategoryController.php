<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    public function index() : Collection
    {
        return Category::all();
    }

    public function store(StoreCategoryRequest $request)
    {
        return Category::create($request->all());
    }

    public function show(Category $category) : Category
    {
        return $category;
    }
    public function update(UpdateCategoryRequest $request, Category $category) : void
    {
        $category->update($request->all());
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }
}
