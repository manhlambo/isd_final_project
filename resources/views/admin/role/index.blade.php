<x-admin-master>
@section('content')

<x-admin-alert/>

    <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteRole" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/roles/{role}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa vai trò, toàn bộ các dữ liệu bao gồm thông tin vai trò người dùng đều sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin vai trò trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='role_id' id='role_id' value=''>

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

<div class="row">

    <div class="col-sm-3">

        <form method='post' action="{{route('role.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text"
                       name='name'
                       id='name' 
                       class="form-control @error('name') is-invalid @enderror">

                <div>
                    @error('name')
                        <span><strong style="color: red;">{{$message}}</strong></span>
                    @enderror
                </div>
            </div>  

            <button class='btn btn-primary btn-block'>Tạo</button>      
        
        </form>
    </div>

    <div class="col-sm-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Vai trò</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Vai trò</th>
                      <th>Xóa</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($roles as $role)
                    <tr>
                      <td>{{$role->id}}</td>
                      <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>
                      <td>

                        <button class="btn btn-danger btn-circle btn-sm"  data-roleid={{ $role->id }} data-toggle="modal" data-target="#deleteRole">
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
    </div>
</div>
@endsection

@section('scripts')

<script>

  $('#deleteRole').on('shown.bs.modal', function (event) {
  
    var button = $(event.relatedTarget)

    var role_id = button.data('roleid')
    var modal = $(this)

    modal.find('.modal-body #role_id').val(role_id);
})
   
</script> 
    
@endsection
</x-admin-master>