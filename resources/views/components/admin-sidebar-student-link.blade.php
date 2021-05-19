<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
    <i class="fas fa-user-graduate"></i>
        <span>Quản Lý Học sinh</span>
    </a>
    <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Chức năng:</h6>
        <a class="collapse-item" href="{{ route('student.create') }}">Tạo học sinh</a>
        <a class="collapse-item" href="{{ route('students.index') }}">Xem tất cả học sinh</a>
        </div>
    </div>
</li>