@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Add Product</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #ffffff;">Title</label>
                            <input type="text" class="form-control bg-dark text-white @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" style="border: 1px solid #2c2e33;">
                        </div>
                        <div class="form-group">
                            <label style="color: #ffffff;">Category</label>
                            <select class="form-control bg-dark text-white @error('category_id') is-invalid @enderror" name="category_id" style="border: 1px solid #2c2e33;">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="color: #ffffff;">Price</label>
                            <input type="number" step="0.01" class="form-control bg-dark text-white @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" style="border: 1px solid #2c2e33;">
                        </div>
                        <div class="form-group">
                            <label style="color: #ffffff;">Quantity</label>
                            <input type="number" class="form-control bg-dark text-white @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" style="border: 1px solid #2c2e33;">
                        </div>
                        <div class="form-group">
                            <label style="color: #ffffff;">Description</label>
                            <textarea class="form-control bg-dark text-white @error('description') is-invalid @enderror" name="description" rows="4" style="border: 1px solid #2c2e33;">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.products') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection