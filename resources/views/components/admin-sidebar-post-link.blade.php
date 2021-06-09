<li class="{{ request()->segment(1) == 'posts' ? 'nav-item active' : 'nav-item'  }}">
    <a class="nav-link collapsed" href="{{route('posts.index')}}" data-toggle="collapse" 
    data-target="#collapsePost" aria-expanded="true" aria-controls="collapsePost">
        <i class="fas fa-bullhorn"></i>
        <span onclick="window.location='{{route('posts.index')}}'" >Quản Lý Thông Báo</span>
    </a>
</li>
