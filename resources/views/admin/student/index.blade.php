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
                <div class="card-header py-3" style="display:flex; justify-content: space-between;">
                  <h6 class="m-0 font-weight-bold text-primary">Tất Cả Học Sinh</h6>
                  <a href="{{ route('students.export') }}" class="btn btn-success" >Xuất dữ liệu</a>
                </div>                
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Họ và tên</th>
                          <th>Ngày sinh</th>
                          <th>Giới tính</th>
                          <th>Phụ huynh</th>
                          <th>Email phụ huynh</th>
                          <th>SĐT phụ huynh</th>
                          <th>Lớp học</th>  
                          <th>Chủ nhiệm</th>    
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Phụ huynh</th>
                            <th>Email phụ huynh</th>
                            <th>SĐT phụ huynh</th>
                            <th>Lớp học</th>
                            <th>Chủ nhiệm</th>     
                            <th>Chức năng</th>
                        </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->id }}</td>
                          <td><a href="{{ route('student.edit', $student->id) }}">{{ $student->name }}</a></td>
                          <td>{{ Date('d-m-Y', Strtotime( $student->dob)) }}</td>
                          <td>{{ $student->gender }}</td>
                          <td>{{ $student->parent_name }}</td>
                          <td>{{ $student->parent_email }}</td>
                          <td>{{ $student->parent_phone }}</td>
                          {{-- <td>{{ $student->classroom->grade.$student->classroom->name }}</td> --}}
                          <td>{{ isset($student->classroom) ? $student->classroom->grade.$student->classroom->name: 'N/a'}}</td>
                          {{-- <td>{{ $student->classroom->teacher->user->name}}</td> --}}
                          <td>{{ isset($student->classroom->teacher) ?  $student->classroom->teacher->user->name: 'N/a' }}</td>
                          <td>
                            <form action="{{ route('student.destroy', $student->id) }}" method='post' enctype='multipart/form-data'>
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