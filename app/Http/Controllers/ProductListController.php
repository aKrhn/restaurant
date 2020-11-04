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

    public function allProduct($name, Request $request)
    {
        $category = Category::with('subcategory')->where('slug', $name) -> first();

        if($request->has('subcategory')){
            $products = $this -> filterProducts($request->get('subcategory'));
        } else {
            $products = Product::where('category_id',$category->id)->get();
        }

        // if($request -> subcategory)
        // {
        //     $products = $this -> filterProducts($request);
        // } else
        // {
        //     $products = Product::where('category_id', $category -> id) -> get();
        // }
        // $subcategories = Subcategory::where('category_id', $category -> id) -> get();
        $slug = $name;
        return view('category', compact('products', 'slug','category'));
    }
    public function filterProducts(Request $request)
    {
        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request -> subcategory) -> get();
        foreach ($subcategory as $sub) {
            array_push($subId, $sub -> id);
        }
        $products = Product::whereIn('subcategory_id', $subId) -> get();
        return $products;
    }

}
