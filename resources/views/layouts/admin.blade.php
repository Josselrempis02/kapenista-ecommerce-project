<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">

    <!-- Add your custom stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all-products.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/order-list.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/order-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inventory.css') }}">
    
    <title>@yield('title', 'Admin Dashboard')</title>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- Sidebar Ends -->

    <!-- Main Component -->
    <div class="main">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- Navbar Ends -->

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