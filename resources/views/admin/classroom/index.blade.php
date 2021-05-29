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
                  <h6 class="m-0 font-weight-bold text-primary">Tất Cả Lớp Học</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Khối</th>
                          <th>Tên lớp</th>
                          <th>Giáo viên chủ nhiệm</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($classrooms as $classroom)
                        <tr>
                          <td><a href="{{ route('classroom.edit', $classroom->id) }}">{{ $classroom->id}}</a></td>
                          <td>{{ $classroom->grade }}</td>
                          <td>{{ $classroom->name }}</td>
                          <td>{{ isset($classroom->teacher) ? $classroom->teacher->user->name: 'Chưa có giáo viên chủ nhiệm' }}</td> 
                          <td>
                            <form action="{{ route('classroom.destroy', $classroom->id) }}" method='post' enctype='multipart/form-data'>
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