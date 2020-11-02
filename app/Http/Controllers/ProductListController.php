<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder() ->
            where('category_id', $product -> category_id) ->
            where('id', '!=', $product -> id) ->
            get();
        return view('show', compact('product', 'productFromSameCategories'));
    }

    public function allProduct($name)
    {
        $category = Category::where('slug', $name) -> first();
        $products = Product::where('category_id', $category -> id) -> get();
        $subcategories = Subcategory::where('category_id', $category -> id) -> get();
        return view('category', compact('products', 'subcategories'));
    }

}
