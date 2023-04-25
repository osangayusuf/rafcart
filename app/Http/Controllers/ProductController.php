<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use League\Flysystem\DirectoryListing;

class ProductController extends Controller
{
    // SHOW HOME PAGE
    public function index() {


        return view('pages.index', [
            'categories' => Category::all(),
            'new_arrivals' => Product::latest()->take(4)->get(),
            'recommended' => Product::inRandomOrder()->take(8)->get(),
        ]);
    }

    // SHOW SHOP PAGE
    public function shop(Request $request) {
        return view('pages.shop', [
            'products' => Product::latest()->filter($request->only(['category', 'brand', 'min', 'max', 'size', 'search']))->paginate(12),
            'categories' => Category::all(),
            'brands' => Product::distinct()->get(['brand'])
        ]);
    }

    // SHOW SINGLE PRODUCT PAGE
    public function showProduct(Product $product) {
        return view('pages.single_product', [
            'product' => $product
        ]);
    }
}
