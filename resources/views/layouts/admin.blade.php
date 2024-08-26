<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
   

    <title>Admin</title>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar-toggle">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/img/final-logo.png') }}" alt="Logo">
        </div>
        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav p-0">
            <li class="sidebar-item">
                <a href="/" class="sidebar-link">
                    <i class="lni lni-grid-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/admin/all-products" class="sidebar-link">
                    <i class="lni lni-cart-full"></i>
                    <span>All Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-empty-file"></i>
                    <span>Order List</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-dropbox"></i>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-bar-chart"></i>
                    <span>Sales Report</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Staff</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-users"></i>
                    <span>Customer</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                   data-bs-target="#auth" aria-expanded="true" aria-controls="auth">
                    <span>Categories</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Cold Coffee</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Hot Coffee</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Bottle Beverages</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Navigation Ends -->
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Setting</span>
            </a>
        </div>
    </aside>
    <!-- Sidebar Ends -->

    <!-- Main Component -->
    <div class="main">
            <nav class="navbar navbar-expand bg-light">
            <button class="toggler-btn" type="button">
                <i class="lni lni-text-align-left"></i>
            </button>

            <div class="dropdown ms-auto"> <!-- ms-auto class aligns the dropdown to the right -->
                <button 
                class="btn custon-btn dropdown-toggle" 
                type="button" 
                id="dropdownMenuButton" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                    ADMIN
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item click" href="#">Settings</a>
                    <a class="dropdown-item click" href="#">Logout</a>
                    
                </div>
            </div>
        </nav>

        
        <!-- Content Section -->
        <section>
            @yield('content')
        </section>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/areaChart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
