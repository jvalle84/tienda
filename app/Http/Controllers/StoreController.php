<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class StoreController extends Controller
{
    public function index()
    {
    	//$products = Product::all();
        $products = Product::where('visible', true)->get();
    	//dd($products);
    	return view('store.index', compact('products'));
    }

    public function show($id) //show($slug)
    {
    	//$product = Product::where('slug', $slug)->first();
        $product = Product::where('id', $id)->first();
    	//dd($product);

    	return view('store.show', compact('product'));
    }
}
