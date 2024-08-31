<aside id="sidebar" class="sidebar-toggle">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/img/final-logo.png') }}" alt="Logo">
        </div>
        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav p-0">
            <li class="sidebar-item">
                <a href="/admin/dashboard" class="sidebar-link">
                    <i class="lni lni-grid-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/products" class="sidebar-link">
                    <i class="lni lni-cart-full"></i>
                    <span>All Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/order-list" class="sidebar-link">
                    <i class="lni lni-empty-file"></i>
                    <span>Order List</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route ('inventory')}}" class="sidebar-link">
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