<x-admin-master>
@section('content')
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      {{-- <div class="error mx-auto" data-text="404">404</div> --}}
      <p class="lead text-gray-800 mb-5">Bạn chưa có lớp học quản lý</p>
      {{-- <p class="text-gray-500 mb-0">Admin sẽ sớm thê</p> --}}
      <a href="{{ route('admin.index') }}">&larr; Quay trở lại bảng điều khiển</a>
    </div>

  </div>
@endsection
</x-admin-master>