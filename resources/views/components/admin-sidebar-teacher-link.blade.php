<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="true" aria-controls="collapseTeacher">
    <i class="fas fa-chalkboard-teacher"></i>
        <span>Quản Lý Giáo Viên</span>
    </a>
    <div id="collapseTeacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Chức Năng:</h6>
        <a class="collapse-item" href="{{route('teacher.create')}}">Thêm giáo viên</a>
        <a class="collapse-item" href="{{route('teachers.index')}}">Xem tất cả giáo viên</a>
        </div>
    </div>
</li>