<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
       

        <!-- Auth Check for Admin or Staff -->
        @auth('admin')
        <div class="d-flex admin-icon px-3">
                <button class="toggler-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
            </div>
        <a class="navbar-brand" href="#"> Admin Panel</a>
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown me-3">
                            <button 
                            class="btn btn-secondary dropdown-toggle position-relative btn-auction" 
                            type="button" 
                            id="notificationDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <i class="bi bi-bell"></i>
                            @if(auth('admin')->check())
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ auth('admin')->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationDropdown">
                            <li class="dropdown-header">Notifications</li>
                            @if(auth('admin')->user()->unreadNotifications->isEmpty())
                                <li>
                                    <span class="dropdown-item text-muted">No new notifications</span>
                                </li>
                            @else
                                @foreach(auth('admin')->user()->unreadNotifications as $notification)
                                <li class="dropdown-item {{ $notification->read_at ? 'bg-light' : 'bg1' }}">
                                    <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-link text-decoration-none text-dark">
                                            @if($notification->type === \App\Notifications\NewOrderNotification::class)
                                                New Order: {{ $notification->data['message'] ?? 'New Order' }}
                                           
                                            @endif
                                            @if(!$notification->read_at)
                                                <span class="badge rounded-pill bg-info ms-2" id="new-badge-{{ $notification->id }}">New</span>
                                            @endif
                                        </button>
                                    </form>
                                </li>
                                @endforeach
                            @endif
                        </ul>

                </div>
                <!-- Welcome Dropdown -->
                <div class="dropdown">
                <button 
                    class="btn-auction dropdown-toggle" 
                    type="button" 
                    id="staffDropdown" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    Welcome, {{ auth('admin')->user()->name }}!
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="staffDropdown">
                    <form action="{{ route('admin-logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </ul>
            </div>
</div>

        @elseif(auth('staff'))
        <a class="navbar-brand" href="#">Staff Panel</a>
        <div class="ms-auto d-flex align-items-center">
            <!-- Notification Dropdown -->
            <div class="dropdown me-3">
            <button 
                class="btn btn-secondary dropdown-toggle position-relative btn-auction" 
                type="button" 
                id="notificationDropdown" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                <i class="bi bi-bell"></i>
                @if(auth('staff')->check())
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ auth('staff')->user()->unreadNotifications->count() }}
                    </span>
                @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationDropdown">
                <li class="dropdown-header">Notifications</li>
                @if(auth('staff')->user()->unreadNotifications->isEmpty())
                    <li>
                        <span class="dropdown-item text-muted">No new notifications</span>
                    </li>
                @else
                    @foreach(auth('staff')->user()->unreadNotifications as $notification)
                    <li class="dropdown-item {{ $notification->read_at ? 'bg-light' : 'bg1' }}">
                        <form action="{{ route('staff.notifications.read', $notification->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-link text-decoration-none text-dark">
                                @if($notification->type === \App\Notifications\NewOrderNotification::class)
                                    Pawn Item Submitted: {{ $notification->data['item_name'] ?? 'Pawn Item Submitted' }}
                               
                                @endif
                                @if(!$notification->read_at)
                                    <span class="badge rounded-pill bg-info ms-2" id="new-badge-{{ $notification->id }}">New</span>
                                @endif
                            </button>
                        </form>
                    </li>
                    @endforeach
                @endif
            </ul>

    </div>
            

            <!-- Welcome Dropdown -->
            <div class="dropdown">
                <button 
                    class="btn-auction dropdown-toggle" 
                    type="button" 
                    id="staffDropdown" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    Welcome, {{ auth('staff')->user()->name }}!
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="staffDropdown">
                    <form action="{{ route('admin-logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
        @else
        <p class="ms-auto">Please log in</p>
        @endauth
    </div>
</nav>