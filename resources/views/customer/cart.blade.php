@extends('layouts.app')

@section('content')
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                    @if(session('cart') && count(session('cart')) > 0)
                        <div class="cart_items">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('product_images/'.$details['image']) }}" alt="{{ $details['name'] }}" style="width: 100px">
                                                    <span class="ms-3">{{ $details['name'] }}</span>
                                                </div>
                                            </td>
                                            <td>${{ number_format($details['price'], 2) }}</td>
                                            <td>{{ $details['quantity'] }}</td>
                                            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_summary">
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="total_price">
                                        <span>Total:</span>
                                        <span>${{ number_format($total, 2) }}</span>
                                    </div>
                                    <button class="btn btn-primary w-100 mt-3">Proceed to Checkout</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty_cart text-center py-5">
                            <i class="fa fa-shopping-cart fa-3x mb-3"></i>
                            <h3>Your cart is empty</h3>
                            <a href="{{ route('products') }}" class="btn btn-primary mt-3">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .cart_section {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .cart_container {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .cart_title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #002c3e;
    }

    .table img {
        border-radius: 5px;
    }

    .total_price {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        font-weight: 600;
        padding: 15px 0;
        border-top: 1px solid #dee2e6;
    }

    .btn-primary {
        background: #f7444e;
        border-color: #f7444e;
    }

    .btn-primary:hover {
        background: #d63031;
        border-color: #d63031;
    }

    .empty_cart {
        color: #6c757d;
    }

    .empty_cart i {
        color: #f7444e;
    }
</style>
@endpush
@endsection