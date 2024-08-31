<nav class="navbar navbar-expand bg-light">

@auth
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
    Welcome, {{auth()->user()->name}} !
    </button>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item click" href="#">Settings</a>
        <a class="dropdown-item click" href="{{ route ('admin-logout')}}">Logout</a>
        
    </div>
</div>
@else


@endauth
</nav>