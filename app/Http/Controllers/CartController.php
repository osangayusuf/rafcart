<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use PhpParser\Node\Stmt\TryCatch;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $user->loadCount('cart');
        return view('pages.cart', [
            'cart' => Cart::where('user_id', auth()->id())->with('product')->get(),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = $request->validate([
            'user_id' => 'integer',
            'product_id' => 'integer'
        ]);

        $product = Product::find($cart['product_id']);

        $alreadyincart = Cart::where('user_id', $cart['user_id'])->where('product_id', $cart['product_id'])->first();

        if($alreadyincart) {
            return redirect()->route('cart.index')->with('message', $product->name . ' already in cart');
        } else {
            Cart::create($cart);
            return redirect()->route('cart.index')->with('message', $product->name . ' added to cart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Cart::destroy($id);

        return redirect('/cart')->with('message', 'Deleted successfully');
    }
}
