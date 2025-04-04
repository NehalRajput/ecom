<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span>Famms</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('category.products', $category) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="user_option">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @else
                        <a href="#" class="btn btn-outline-primary me-2">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</header>

@push('styles')
<style>
    .user_option .btn {
        padding: 8px 20px;
        font-weight: 500;
    }
    
    .user_option .btn-primary {
        background-color: #f7444e;
        border-color: #f7444e;
    }
    
    .user_option .btn-outline-primary {
        color: #f7444e;
        border-color: #f7444e;
    }
    
    .user_option .btn-primary:hover {
        background-color: #d63031;
        border-color: #d63031;
    }
    
    .user_option .btn-outline-primary:hover {
        background-color: #f7444e;
        color: white;
    }
</style>
@endpush