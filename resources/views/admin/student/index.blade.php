<x-admin-master>
    @section('content')
    
      @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        
        @elseif(Session::has('updated-message'))
        <div class="alert alert-success">{{Session::get('updated-message')}}</div>
        @elseif(Session::has('destroy-message'))
        <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
        
      @endif 

      
    <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/students/{student}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa học sinh, toàn bộ các dữ liệu bao gồm thông tin học sinh, điểm số sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin học sinh trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='student_id' id='student_id' value=''>

              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-success btn-icon-split" data-dismiss="modal"> 
                  <span class="icon text-white-50">
                    <i class="fas fa-window-close"></i>
                  </span>
                  <span class="text">Hủy</span>
                </button>

                <button type="submit" class="btn btn-danger btn-circle ">
                  <i class="fas fa-trash"></i>
                </button>
                
              </div>

         </form>

        </div>
      </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3" style="display:flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Tất Cả Học Sinh</h6>

        @can('create', App\Student::class)

        <a href="{{ route('students.export') }}" class="btn btn-success btn-icon-split">
          <span class="icon text-white-50">
            <i class="far fa-file-excel"></i>
          </span>
          <span class="text">Xuất dữ liệu</span>
        </a>                 
        @endcan

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
                <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
              <tr>
                <td>{{ $student->id }}</td>
                <td>
                  @can('update', $student)
                  <a href="{{ route('student.edit', $student->id) }}">{{ $student->name }}</a>
                  @endcan

                  @cannot('update', $student)
                    {{ $student->name }}
                  @endcannot
                </td>
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

                  @can('create', App\Student::class)
                  <button class="btn btn-danger btn-circle btn-sm" data-studentid={{ $student->id }}  data-toggle="modal" data-target="#deleteStudent">
                    <i class="fas fa-trash"></i>
                  </button>
                  @endcan

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

      <script>

        $('#deleteStudent').on('shown.bs.modal', function (event) {
        
          var button = $(event.relatedTarget)
      
          var student_id = button.data('studentid')
          var modal = $(this)
      
          modal.find('.modal-body #student_id').val(student_id);
      })
         
      </script> 
    
    
    
      @endsection
    </x-admin-master>