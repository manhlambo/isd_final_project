<x-admin-master>
@section('content')

@if(Session::has('delete-user'))
    <div class="alert alert-danger">{{Session::get('delete-user')}}</div>
    @elseif(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>

@endif

    <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/users/{user}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa người dùng, toàn bộ các dữ liệu bao gồm thông tin và vai trò đều sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin người dùng trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='user_id' id='per_id' value=''>

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
            <th>Tạo giáo viên</th>
            <th>Xóa</th>
          </tr>
        </thead>

        <tbody>
            @foreach($users as $per)
          <tr>
            <td>{{$per->id}}</td>
            <td><a href="{{route('user.profile.show', $per->id)}}">{{$per->name}}</a></td>
            <td>{{$per->email}}</td>
            <td>{{date('d-m-Y', Strtotime($per->created_at))}}</td>
            <td>{{date('d-m-Y', Strtotime($per->updated_at))}}</td>
            <td>
              <a href="{{ route('teacher.create', $per) }}" class = "btn btn-success btn-circle btn-sm">
                <i class="fas fa-plus-circle"></i>
              </a>
            </td>
            <td>

              <button class="btn btn-danger btn-circle btn-sm" data-perid={{ $per->id }} data-toggle="modal" data-target="#deleteUser">
                <i class="fas fa-trash"></i>
              </button>

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

    $('#deleteUser').on('shown.bs.modal', function (event) {
    
      var button = $(event.relatedTarget)

      var per_id = button.data('perid')
      var modal = $(this)

      modal.find('.modal-body #per_id').val(per_id);
  })
     
  </script> 

@endsection
</x-admin-master>