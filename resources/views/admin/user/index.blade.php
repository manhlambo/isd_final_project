<x-admin-master>

@section('content')

@if(Session::has('delete-user'))
    <div class="alert alert-danger">{{Session::get('delete-user')}}</div>
@endif

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="users-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Ngày tạo</th>
                      <th>Ngày sửa đổi</th>
                      <th>Chức Năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Ngày tạo</th>
                      <th>Ngày sửa đổi</th>
                      <th>Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                      <td>
                          <form action="{{route('user.destroy', $user->id)}}" method='post' enctype='multipart/form-data'>
                          @csrf
                          @method('DELETE')
                            <button type='submit' class="btn btn-danger">Xóa</button>
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