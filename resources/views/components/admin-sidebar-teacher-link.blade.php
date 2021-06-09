<li class="{{ request()->segment(1) == 'teachers' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{route('teachers.index')}}" data-toggle="collapse" data-target="#collapseTeacher" 
    aria-expanded="true" aria-controls="collapseTeacher">

    <i class="fas fa-chalkboard-teacher"></i>
        <span onclick="window.location='{{route('teachers.index')}}'">Quản Lý Giáo Viên</span>
    </a>

</li>