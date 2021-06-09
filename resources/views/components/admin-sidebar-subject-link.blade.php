<li class="{{ request()->segment(1) == 'subjects' ? 'nav-item active' : 'nav-item' }}">

    <a class="nav-link collapsed" href="{{ route('subjects.index') }}" data-toggle="collapse" 
    data-target="#collapseSubject" aria-expanded="true" aria-controls="collapseSubject">
    <i class="fas fa-book"></i>
        <span onclick="window.location='{{ route('subjects.index') }}'">Quản Lý Môn Học</span>

    </a>

</li>