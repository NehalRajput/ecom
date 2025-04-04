@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #f5f5f5; padding: 20px 0;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center mb-5">
            <h2>{{ $category->name }} <span>Collection</span></h2>
        </div>

        <div class="row">
            @forelse ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('product_images/'.$product->image) }}" 
                             alt="{{ $product->title }}"
                             style="width: 200px; height: 250px; object-fit: cover;">
                    </div>
                    <div class="detail-box p-3">
                        <h5 class="product-title mb-2">{{ $product->title }}</h5>
                        @if($product->discount_price)
                            <div class="price-box">
                                <span class="new-price">${{ number_format($product->discount_price, 2) }}</span>
                                <span class="old-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                        @else
                            <div class="price-box">
                                <span class="new-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                        @endif
                        <a href="{{ route('product.details', $product) }}" class="btn btn-view mt-3">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    No products available in this category.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .breadcrumb {
        background: transparent;
        margin-bottom: 0;
    }
    
    .breadcrumb-item a {
        color: #f7444e;
        text-decoration: none;
    }

    .box {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .box:hover {
        transform: translateY(-5px);
    }

    .img-box {
        text-align: center;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px 8px 0 0;
    }

    .detail-box {
        text-align: center;
    }

    .product-title {
        font-size: 1rem;
        color: #333;
        height: 48px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .price-box {
        margin: 10px 0;
    }

    .new-price {
        color: #f7444e;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .old-price {
        color: #999;
        text-decoration: line-through;
        margin-left: 10px;
        font-size: 0.9rem;
    }

    .btn-view {
        background: #f7444e;
        color: white;
        padding: 8px 25px;
        border-radius: 25px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-view:hover {
        background: #d63031;
        color: white;
    }

    .heading_container h2 {
        font-size: 2rem;
        color: #333;
    }

    .heading_container span {
        color: #f7444e;
    }
</style>
@endpush
@endsection