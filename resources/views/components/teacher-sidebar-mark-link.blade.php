<li class="{{ request()->segment(1) == 'teacherStudentsList' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{ route('teacherStudents.list') }}" data-toggle="collapse" 
    data-target="#collapeMark_studentTeacher" 
    aria-expanded="true" 
    aria-controls="collapeMark_studentTeacher">
        <i class="fas fa-poll"></i>
        <span onclick="window.location='{{ route('teacherStudents.list') }}'" >Quản Lý Điểm</span>

    </a>

</li>