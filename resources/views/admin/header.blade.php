
<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
            <img src="{{ asset('AdminLinks/assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" class="form-control" placeholder="Search products">
                </form>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <!-- Project dropdown -->
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                <!-- Project dropdown menu -->
            </li>
            <!-- Messages dropdown -->
            <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                </a>
                <!-- Messages dropdown menu -->
            </li>
            <!-- Notifications dropdown -->
            <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    <span class="count bg-danger"></span>
                </a>
                <!-- Notifications dropdown menu -->
            </li>
            <!-- Profile/Logout dropdown -->
            <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-account"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="{{ route('admin.logout') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Logout</p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
