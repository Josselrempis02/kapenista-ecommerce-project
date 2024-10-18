<nav class="navbar navbar-expand bg-light">
    @auth('admin')
        <button class="toggler-btn" type="button">
            <i class="lni lni-text-align-left"></i>
        </button>

        <div class="dropdown ms-auto">
            <button 
                class="custon-btn dropdown-toggle" 
                type="button" 
                id="dropdownMenuButton" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                Welcome, {{ auth('admin')->user()->name }}!
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('admin-logout') }}">Logout</a>
            </div>
        </div>
    @elseif(auth('staff'))
        <button class="toggler-btn" type="button">
            <i class="lni lni-text-align-left"></i>
        </button>

        <div class="dropdown ms-auto">
            <button 
                class="custon-btn dropdown-toggle" 
                type="button" 
                id="dropdownMenuButton" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                Welcome, {{ auth('staff')->user()->name }}!
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('admin-logout') }}">Logout</a>
            </div>
        </div>
    @else
       
    @endauth
</nav>
