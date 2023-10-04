<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(): View
    {
        $products = Product::all();
        return view('products',compact('products'));
    }
}
