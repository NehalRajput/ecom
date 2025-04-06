@extends('layouts.app')

@section('content')
<div class="checkout_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout_form">
                    <h2>Checkout Details</h2>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Shipping Address</label>
                            <textarea name="shipping_address" class="form-control" required rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order_summary">
                    <h3>Order Summary</h3>
                    <div class="cart_items">
                        @foreach($cartItems as $id => $item)
                            <div class="cart_item">
                                <div class="item_name">{{ $item['name'] }}</div>
                                <div class="item_details">
                                    <span>${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</span>
                                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="total_amount">
                        <span>Total Amount:</span>
                        <span>${{ number_format($cartService->getCartTotal(), 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .checkout_section {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .checkout_form, .order_summary {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .cart_item {
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .item_details {
        display: flex;
        justify-content: space-between;
        color: #666;
        margin-top: 5px;
    }

    .total_amount {
        display: flex;
        justify-content: space-between;
        font-weight: 600;
        font-size: 18px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #eee;
    }

    .btn-primary {
        background: #f7444e;
        border-color: #f7444e;
        width: 100%;
        padding: 12px;
    }

    .btn-primary:hover {
        background: #d63031;
        border-color: #d63031;
    }
</style>
@endpush
@endsection