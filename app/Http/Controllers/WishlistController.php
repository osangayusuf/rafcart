<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserItemRequest;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.wishlist', [
            'wishlist' => Wishlist::where('user_id', auth()->id())->with('product')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Product $product)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserItemRequest $request)
    {
        $wishlist = $request->validated();

        $product = Product::find($wishlist['product_id']);

        $alreadyinwishlist = Wishlist::where('user_id', $wishlist['user_id'])->where('product_id', $wishlist['product_id'])->first();

        if(isset($alreadyinwishlist)) {
            return redirect()->route('wishlist.index')->with('message', $product->name . ' already in wishlist');
        } else {
            Wishlist::create($wishlist);
            return redirect()->route('wishlist.index')->with('message', $product->name . ' added to wishlist');
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
    public function destroy(string $id)
    {
        Wishlist::destroy($id);

        return back()->with('message', 'Deleted successfully');
    }
}
