<li class="{{ request()->segment(1) == 'users' ? 'nav-item active' : 'nav-item' }}">
    <a class="nav-link collapsed" href="{{route('users.index')}}" data-toggle="collapse" data-target="#collapseUser" 
    aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-users"></i>
        <span onclick="window.location='{{route('users.index')}}'">Quản Lý Người Dùng</span>
    </a>
</li>
