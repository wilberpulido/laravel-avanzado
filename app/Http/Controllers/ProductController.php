<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    public function index() : Collection
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request) : Product
    {
        return Product::create($request->all());
    }

    public function show(Product $product) : Product
    {
        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product) : void
    {
        $product->update($request->all());
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
