@extends('layouts.app')

@section('content')
<section class="product_detail_section">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Product <span>Details</span></h2>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="{{ asset('product_images/'.$product->image) }}" 
                         alt="{{ $product->title }}" 
                         style="max-width: 250px; height: 300px; object-fit: cover; margin: 0 auto; display: block;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <h1 class="product-title">{{ $product->title }}</h1>
                    
                    <div class="price_box">
                        @if($product->discount_price)
                            <h2 class="current-price">${{ number_format($product->discount_price, 2) }}</h2>
                            <span class="original-price">${{ number_format($product->price, 2) }}</span>
                            <span class="discount-badge">Sale</span>
                        @else
                            <h2 class="current-price">${{ number_format($product->price, 2) }}</h2>
                        @endif
                    </div>

                    <div class="product-description">
                        <h3>Description</h3>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="product-options">
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <select class="form-select" id="quantity">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <button class="btn btn-primary add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .product_detail_section {
        padding: 50px 0;
        background-color: #f7f7f7;
    }

    .img-box {
        max-width: 300px;
        padding: 10px;
    }

    .detail-box {
        padding: 20px;
    }

    .product-title {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .current-price {
        font-size: 1.75rem;
    }

    .original-price {
        font-size: 1.25rem;
    }

    .product-description {
        margin: 20px 0;
    }

    .product-description h3 {
        font-size: 1.5rem;
    }
</style>
@endpush
@endsection