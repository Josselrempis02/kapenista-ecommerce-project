@extends('layouts.app')

@section('content')

<section class="container my-5 notifications">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Section Header -->
            <div class="text-center mb-4">
                <h1 class="display-5">Notifications</h1>
                <p class="text-muted">Stay updated with the latest information</p>
            </div>

            <!-- Notifications List -->
            <div class="notifications-list">
                @if($notifications->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="icon-bell-slash"></i>
                        <p class="mt-2">You have no notifications at the moment.</p>
                    </div>
                @else
                    <div class="list-group">
                        @foreach($notifications as $notification)
                            <div class="list-group-item {{ $notification->read_at ? '' : 'unread' }}">
                                <div class="content">
                                    <div class="title">
                                        <i class="icon-bell"></i>
                                        {{ $notification->data['title'] ?? 'Notification Title' }}
                                        
                                    </div>
                                    <span class="message">{{ $notification->data['message'] ?? 'Notification message goes here.' }}</span>
                                    <small class="timestamp">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                <a href="{{ route('notifications.read', $notification->id) }}" 
                                   class="mark-read {{ $notification->read_at ? 'read' : 'unread' }}">
                                    {{ $notification->read_at ? 'Read' : 'Mark as Read' }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{ $notifications->links() }} 
</section>


@endsection
