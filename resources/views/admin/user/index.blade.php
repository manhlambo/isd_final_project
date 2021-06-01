<x-admin-master>
@section('content')

@if(Session::has('delete-user'))
    <div class="alert alert-danger">{{Session::get('delete-user')}}</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Người dùng</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>                      
            <th>ID</th>
            <th>Tên</th>
            <th>Địa chỉ email</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa đổi</th>
            <th>Xóa</th>
          </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{date('d-m-Y', Strtotime($user->created_at))}}</td>
            <td>{{date('d-m-Y', Strtotime($user->updated_at))}}</td>
            <td>

              <form action="{{route('user.destroy', $user->id)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('DELETE')
                  <button type='submit' class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                  </button>
              </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>

@endsection
</x-admin-master>