<li class="{{ request()->segment(1) == 'roles' ? 'nav-item active' : 'nav-item' }}">
    <a class="nav-link collapsed" href="{{route('roles.index')}}" data-toggle="collapse" 
    data-target="#collapseAuthorization" aria-expanded="true" aria-controls="collapseAuthorization">
    <i class="fas fa-unlock"></i>
        <span onclick="window.location='{{route('roles.index')}}'">Quản Lý Phân quyền</span>
    </a>

</li>