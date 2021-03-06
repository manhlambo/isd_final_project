<x-admin-master>
    
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng Điều Khiển</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Xin chào {{ auth()->user()->name }}</h6>
            </div>

            @if (auth()->user()->userHasRole('Admin'))
                <div class="card-body">
                    <ul>
                        <li>Phân Quyền: <b>{{ auth()->user()->roles->first()->name ?? 'N/a'}} </b> </li>
                        <li>Ngày tham gia: <b>{{date('d-m-Y', Strtotime(auth()->user()->created_at)) }}</b> </li>
                    </ul>
                </div>
            @else
                <div class="card-body">
                    <ul>
                        <li>Phân Quyền: <b>{{ auth()->user()->roles->first()->name ?? 'N/a'}} </b> </li>
                        <li>Lớp quản lý: <b>{{ auth()->user()->teacher->classroom->grade ?? 'N'}}{{auth()->user()->teacher->classroom->name ?? '/a'}}</b></li>
                        <li>Số lượng học sinh: <b>{{ isset(auth()->user()->teacher->classroom) ? auth()->user()->teacher->classroom->students->count(): 'N/a' }}</b></li>
                        <li>Ngày tham gia: <b>{{date('d-m-Y', Strtotime(auth()->user()->created_at)) }}</b> </li>
                    </ul>
                </div>
            @endif

            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('backend/img/undraw_posting_photo.svg') }}" alt="">
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        @if (auth()->user()->userHasRole('Admin'))
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-light shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                    <a href="{{ route('roles.index') }}">Phân Quyền</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$roles->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-unlock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->userHasRole('Admin'))
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
        @endif


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
                                <a href="{{ route('students.index') }}">Học sinh toàn trường</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    <a href="{{ route('subjects.index') }}">Môn học</a></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subjects->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            <a href="{{ route('posts.index') }}">Thông báo</a></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>



</div>
@endsection('endcontent')
</x-admin-master>