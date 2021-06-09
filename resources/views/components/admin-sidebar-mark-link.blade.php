<li class="{{ request()->segment(1) == 'studentsList' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{ route('students.list') }}" data-toggle="collapse" 
    data-target="#collapeMark" aria-expanded="true" aria-controls="collapeMark">
        <i class="fas fa-poll"></i>
        <span onclick="window.location='{{ route('students.list') }}'">Quản Lý Điểm</span>

    </a>

</li>