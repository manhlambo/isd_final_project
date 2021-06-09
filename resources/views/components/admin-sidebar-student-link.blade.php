<li class="{{ request()->segment(1) == 'students' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{route('students.index')}}" data-toggle="collapse" 
    data-target="#collapseStudent" 
    aria-expanded="true" aria-controls="collapseStudent">

    <i class="fas fa-user-graduate"></i>
        <span onclick="window.location='{{route('students.index')}}'">Quản Lý Học sinh</span>
    </a>

</li>