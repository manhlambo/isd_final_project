<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClassRoom" aria-expanded="true" aria-controls="collapseClassRoom">
        <i class="fas fa-chalkboard"></i>        
        <span>Quản Lý Lớp Học</span>
    </a>
    <div id="collapseClassRoom" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Chức Năng:</h6>
        <a class="collapse-item" href="{{ route('classroom.create') }}">Thêm lớp học</a>
        <a class="collapse-item" href="{{ route('classrooms.index') }}">Xem tất cả lớp học</a>
        </div>
    </div>
</li>