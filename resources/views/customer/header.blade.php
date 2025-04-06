<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="/">
                <span>Famms</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/') }}">All Products</a>
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('category.products', $category) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="cart-count">{{ count(session('cart', [])) }}</span>
                        </a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

@push('styles')
<style>
    /* Add these new styles */
    .cart-icon {
        position: relative;
        font-size: 20px;
    }

    .cart-count {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #f7444e;
        color: white;
        font-size: 12px;
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
</style>
@endpush