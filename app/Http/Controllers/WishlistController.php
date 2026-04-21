<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $wishlists = Wishlist::where('user_id', Auth::id())->with('product')->get();
        $products = $wishlists->pluck('product');
        // dd($wishlist);
        $breadcrumbs = [
            ['label' => 'Danh sách yêu thích'],
        ];
        return view('user.wishlist.index', compact('products', 'breadcrumbs'));
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
    public function store(Request $request, $productId)
    {
        //
        $user = auth()->user();
       
        $exists = $user->wishlists()->where('product_id', $productId)->first();

        if ($exists) {
            $exists->delete();
            $message = 'Đã xóa khỏi danh sách yêu thích';
        } else {
            $user->wishlists()->create([
                'product_id' => $productId
            ]);
            $message = 'Đã thêm vào danh sách yêu thích';
        }

        return back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist, $productId)
    {
        //
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first();
        $wishlist->delete();
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích');
    }
}
