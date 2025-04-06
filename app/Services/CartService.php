<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function addToCart($productId, $quantity)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);
        
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => $product->discount_price ?? $product->price,
                "image" => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        
        return [
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => array_sum(array_column($cart, 'quantity'))
        ];
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }

    public function getCartItems()
    {
        return session()->get('cart', []);
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return true;
    }
}