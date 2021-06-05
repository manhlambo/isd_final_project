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
    <div class="modal modal-danger fade" id="deleteTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/teachers/{teacher}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa giáo viên, toàn bộ các dữ liệu bao gồm thông tin giáo viên, lớp học và học sinh giáo viên quản lý đều sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin giáo viên trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='teacher_id' id='teacher_id' value=''>

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
              <h6 class="m-0 font-weight-bold text-primary">Tất Cả Giáo Viên</h6>

              @can('create', App\Teacher::class)
                <a href="{{ route('teachers.export') }}" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="far fa-file-excel"></i>
                  </span>
                  <span class="text">Xuất dữ liệu</span>
                </a>
              @endcan

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class='thead-light'>
                    <tr>
                      <th>ID</th>
                      <th>Họ và tên</th>
                      <th>Địa chỉ email</th>
                      <th>Ngày sinh</th>
                      <th>Số Điện Thoại</th>      
                      <th>Xóa</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($teachers as $teacher)
                    <tr>
                      <td>{{ $teacher->id }}</td>
                      <td>
                        @can('update', $teacher)
                            <a href="{{ route('teacher.edit', $teacher->id) }}">{{ $teacher->user->name }}</a>
                        @endcan

                        @cannot('update', $teacher)
                            {{ $teacher->user->name }}
                        @endcannot
                      </td>
                      <td>{{ $teacher->user->email }}</td>
                      <td>{{ isset($teacher->dob) ? date('d-m-Y', Strtotime($teacher->dob)): '' }}</td>
                      <td>{{ $teacher->phone }}</td>
                      <td>  
                        @can('update', $teacher)
                        <button class="btn btn-danger btn-circle btn-sm" data-teacherid={{ $teacher->id }} data-toggle="modal" data-target="#deleteTeacher">
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

    $('#deleteTeacher').on('shown.bs.modal', function (event) {
    
      var button = $(event.relatedTarget)
  
      var teacher_id = button.data('teacherid')
      var modal = $(this)
  
      modal.find('.modal-body #teacher_id').val(teacher_id);
  })
     
  </script> 




  @endsection
</x-admin-master>