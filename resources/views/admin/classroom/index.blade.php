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
    <div class="modal modal-danger fade" id="deleteClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/classrooms/{classroom}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa lớp học, toàn bộ các dữ liệu bao gồm thông tin lớp học, giáo viên chủ nhiệm, học sinh theo học sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin lớp học trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='classroom_id' id='classroom_id' value=''>

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
        <h6 class="m-0 font-weight-bold text-primary">Tất Cả Lớp Học</h6>
        
        @can('create', App\ClassRoom::class)
        <a href="{{ route('classroom.create') }}" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
          </span>
          <span class="text">Thêm lớp học</span>
        </a>
        @endcan

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class='thead-light'>
              <tr>
                <th>ID</th>
                <th>Khối</th>
                <th>Tên lớp</th>
                <th>Giáo viên chủ nhiệm</th>
                <th>Thêm học sinh</th>
                <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($classrooms as $classroom)
              <tr>
                <td>
                  @can('update', $classroom)
                  <a href="{{ route('classroom.edit', $classroom->id) }}">{{ $classroom->id}}</a>
                  @endcan

                  @cannot('update', $classroom)
                    {{ $classroom->id }}
                  @endcannot
                </td>
                <td>{{ $classroom->grade }}</td>
                <td>{{ $classroom->name }}</td>
                <td>{{ isset($classroom->teacher) ? $classroom->teacher->user->name: 'Chưa có giáo viên chủ nhiệm' }}</td>
                <td>
                  @can('create', App\ClassRoom::class)
                    <a href="{{ route('student.create', $classroom) }}" class = "btn btn-success btn-circle btn-sm">
                      <i class="fas fa-plus-circle"></i>
                    </a>
                  @endcan
                </td>
                <td>
                  @can('create', App\ClassRoom::class)
                  <button class="btn btn-danger btn-circle btn-sm" data-classroomid={{ $classroom->id }} data-toggle="modal" data-target="#deleteClass">
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

        $('#deleteClass').on('shown.bs.modal', function (event) {
        
          var button = $(event.relatedTarget)
      
          var classroom_id = button.data('classroomid')
          var modal = $(this)
      
          modal.find('.modal-body #classroom_id').val(classroom_id);
      })
         
      </script> 

      @endsection
    </x-admin-master>