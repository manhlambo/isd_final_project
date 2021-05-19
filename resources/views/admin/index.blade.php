<x-admin-master>
    
@section('content')

    @if(auth()->user()->userHasRole('Admin'))
    <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bảng Điều Khiển</h1>

</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="{{ route('users.index') }}">Người Dùng</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <a href="{{ route('teachers.index') }}">Giáo Viên</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teachers->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <a href="{{ route('classrooms.index') }}">Lớp học</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $classrooms->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard fa-2x text-gray-300"></i> 
                        {{-- <i class="fas fa-user-graduate fa-2x text-gray-300"></i> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Môn học</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">N/A</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    @endif
@endsection('endcontent')
</x-admin-master>