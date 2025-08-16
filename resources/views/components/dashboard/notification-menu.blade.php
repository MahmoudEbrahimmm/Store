<ul class="navbar-nav">
    <!-- Dropdown Notifications -->
    <li class="nav-item dropdown d-flex align-items-center">
        <a class="nav-link position-relative d-flex align-items-center" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bell fa-xl"></i>
            @if ($newCount)
            <span class="position-absolute top-2 start-80 translate-middle badge rounded-pill bg-warning">
                {{ $newCount }}
            </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="messagesDropdown" style="width: 300px;">
            <li class="dropdown-header">{{ $newCount }} Notifications</li>
            @foreach ($notifications as $notification)
                <a href="{{route('dashboard')}}?notification_id={{$notification->id}}" class="dropdown-item @if ($notification->unread()) fw-bold @endif">
                    <i class="{{ $notification->data['icon'] }} mr-2">{{ $notification->data['body']}}</i>
                    <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                </a>
                <div class="dropdown-divider"></div>
                @endforeach
            <li><a class="dropdown-item text-center" href="#">See All Notifications</a></li>
        </ul>
    </li>
</ul>
