<li class="{{ request()->segment(1) == 'classrooms' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{route('classrooms.index')}}" data-toggle="collapse" data-target="#collapseClassRoom" aria-expanded="true" aria-controls="collapseClassRoom">
        <i class="fas fa-chalkboard"></i>   

        <span onclick="window.location='{{route('classrooms.index')}}'">Quản Lý Lớp Học</span>
    </a>

</li>