@extends('layouts.app')

@section('content')
<div class="hero_area">
  
    <section class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product_img">
                        <img src="{{ asset('product_images/'.$product->image) }}" alt="{{ $product->title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product_info">
                        <h1>{{ $product->title }}</h1>
                        <div class="price_box">
                            @if($product->discount_price)
                                <span class="current_price">${{ number_format($product->discount_price, 2) }}</span>
                                <span class="old_price">${{ number_format($product->price, 2) }}</span>
                                <span class="save_price">Save {{ number_format((($product->price - $product->discount_price) / $product->price) * 100, 0) }}%</span>
                            @else
                                <span class="current_price">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        <div class="product_desc">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="product_category">
                            <span>Category:</span>
                            <a href="{{ route('category.products', $product->category) }}">{{ $product->category->name }}</a>
                        </div>
                        <div class="product_actions">
                            <div class="quantity">
                                <label>Quantity:</label>
                                <select class="form-select">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button class="btn_add_to_cart">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<style>
    .hero_area {
        background-color: #fafafa;
    }

    .breadcrumb-section {
        padding: 20px 0;
        background: #002c3e;
        margin-bottom: 40px;
    }

    .breadcrumb-item a {
        color: #f7444e;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #ffffff;
    }

    .product_details {
        padding: 0 0 60px;
    }

    .product_img {
        text-align: center;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .product_img img {
        max-width: 100%;
        height: auto;
    }

    .product_info {
        padding: 20px;
    }

    .product_info h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #002c3e;
    }

    .price_box {
        margin-bottom: 25px;
    }

    .current_price {
        font-size: 28px;
        color: #f7444e;
        font-weight: 600;
    }

    .old_price {
        font-size: 20px;
        color: #999;
        text-decoration: line-through;
        margin-left: 10px;
    }

    .save_price {
        background: #f7444e;
        color: white;
        padding: 3px 10px;
        border-radius: 3px;
        font-size: 14px;
        margin-left: 10px;
    }

    .product_desc {
        margin: 25px 0;
        color: #666;
        line-height: 1.6;
    }

    .product_category {
        margin-bottom: 25px;
    }

    .product_category span {
        color: #002c3e;
        font-weight: 500;
    }

    .product_category a {
        color: #f7444e;
        text-decoration: none;
        margin-left: 5px;
    }

    .product_actions {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .quantity {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity label {
        color: #002c3e;
        font-weight: 500;
        margin: 0;
    }

    .quantity select {
        width: 80px;
    }

    .btn_add_to_cart {
        background: #f7444e;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }

    .btn_add_to_cart:hover {
        background: #002c3e;
    }

    @media (max-width: 768px) {
        .product_actions {
            flex-direction: column;
            align-items: stretch;
        }
        
        .quantity {
            justify-content: space-between;
        }
    }
</style>
@endpush
@endsection