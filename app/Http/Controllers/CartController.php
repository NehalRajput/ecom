<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        return response()->json(
            $this->cartService->addToCart($request->product_id, $request->quantity)
        );
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItems();
        return view('customer.cart', compact('cartItems'));
    }

    public function remove($id)
    {
        $this->cartService->removeFromCart($id);
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}