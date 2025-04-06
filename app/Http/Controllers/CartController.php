<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;

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

    public function checkout()
    {
        if ($this->cartService->isCartEmpty()) {
            return redirect()->route('products')->with('info', 'Your cart is empty.');
        }

        $cartItems = $this->cartService->getCartItems();
        $cartTotal = $this->cartService->getCartTotal();
        
        return view('customer.checkout', [
            'cartItems' => $cartItems,
            'cartService' => $this->cartService,
            'cartTotal' => $cartTotal
        ]);
    }

    public function processCheckout(Request $request)
    {
        $cartItems = $this->cartService->getCartItems();
        
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $this->cartService->getCartTotal(),
            'shipping_address' => $request->shipping_address,
            'phone' => $request->phone,
            'status' => 'pending'
        ]);

        foreach ($cartItems as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // Clear the cart after successful order
        $this->cartService->clearCart();

        return redirect()->route('account.orders')->with('success', 'Order placed successfully!');
    }
}