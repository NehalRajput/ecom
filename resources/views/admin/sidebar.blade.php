<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('/') }}">
            <img src="{{ asset('AdminLinks/assets/images/logo.svg') }}" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{ url('/') }}">
            <img src="{{ asset('AdminLinks/assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{ asset('AdminLinks/assets/images/faces/face15.jpg') }}" alt="Profile Picture">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <!-- Category Links -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.categories.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-circle"></i>
                </span>
                <span class="menu-title">Add Category</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.categories.show') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-format-list-bulleted"></i>
                </span>
                <span class="menu-title">Show Categories</span>
            </a>
        </li>

        <!-- Product Links -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.products.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-cart-plus"></i>
                </span>
                <span class="menu-title">Add Product</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.products') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-grid"></i>
                </span>
                <span class="menu-title">Show Products</span>
            </a>
        </li>
       
</nav>