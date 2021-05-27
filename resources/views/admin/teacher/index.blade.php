<x-admin-master>
@section('content')

  @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    
    @elseif(Session::has('updated-message'))
    <div class="alert alert-success">{{Session::get('updated-message')}}</div>
    @elseif(Session::has('destroy-message'))
    <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
    
  @endif 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tất Cả Giáo Viên</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Họ và tên</th>
                      <th>Địa chỉ email</th>
                      <th>Ngày sinh</th>
                      <th>Số Điện Thoại</th>      
                      <th>Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Họ và tên</th>
                      <th>Địa chỉ email</th>
                      <th>Ngày sinh</th>
                      <th>Số Điện Thoại</th>
                      <th>Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($teachers as $teacher)
                    <tr>
                      <td>{{ $teacher->id }}</td>
                      <td><a href="{{ route('teacher.edit', $teacher->id) }}">{{ $teacher->user->name }}</a></td>
                      <td>{{ $teacher->user->email }}</td>
                      <td>{{ date('d-m-Y', Strtotime($teacher->dob)) }}</td>
                      <td>{{ $teacher->phone }}</td>
                      <td>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method='post' enctype='multipart/form-data'>
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