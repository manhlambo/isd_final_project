<x-admin-master>
@section('content')

<x-admin-alert/>
    
    <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteSubject" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/subjects/{subject}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa môn học này, toàn bộ học sinh đang theo học môn học và điểm số cũng sẽ bị xóa.
                    <br>
                    <br> 
                    Hãy đảm bảo bạn đã sao lưu toàn bộ điểm và kiểm tra kỹ thông tin môn học.
                  </b>
                </p>
                <input type="hidden" name='subject_id' id='sub_id' value=''>
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
    
    @can('create', App\Subject::class)
    <div class="col-sm-3">

      <form method='post' action="{{ route('subject.store') }}">
          @csrf
          <div class="form-group">
              <label for="name">Tên môn học</label>
              <input type="text"
                      name='name'
                      value="{{ old('name') }}"
                      id='name' 
                      class="form-control @error('name') is-invalid @enderror">

              <div>
                  @error('name')
                      <span><strong style="color: red;">{{$message}}</strong></span>
                  @enderror
              </div>
          </div>  

          
          <div class="form-group">
              <label for="assign">Giảng Viên</label>
              <input type="text"
                      name='assign'
                      value="{{ old('assign') }}"
                      id='assign' 
                      class="form-control @error('assign') is-invalid @enderror">

              <div>
                  @error('assign')
                      <span><strong style="color: red;">{{$message}}</strong></span>
                  @enderror
              </div>
          </div>

          <button class='btn btn-primary btn-block'>Tạo môn học</button>      
      
      </form>
    </div>
    @endcan

    @cannot('create', App\Subject::class)
      <div class="col-sm-1">
      </div>
    @endcannot

    
    <div class="col-sm-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tất cả môn học</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class='thead-light'>
                    <tr>
                      @can('create', App\Subject::class)
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Giảng viên</th>
                      <th>Xóa</th>
                      @endcan

                      @cannot('create', App\Subject::class)
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Giảng viên</th>
                      @endcannot
                    </tr>
                  </thead>

                  <tbody>
                      @foreach ($subjects as $sub)
                      <tr>
                        <td>{{ $sub->id }}</td>
                        <td>
                          @can('update', $sub)
                          <a href="{{ route('subject.edit', $sub->id) }}">{{ $sub->name }}</a>
                          @endcan

                          @cannot('update', $sub)
                            {{ $sub->name }}
                          @endcannot
                        </td>
                        <td>{{ $sub->assign }}</td>

                        @can('delete', $sub)
                        <td>
                          <button class="btn btn-danger btn-circle btn-sm" data-subid={{ $sub->id }} data-toggle="modal" data-target="#deleteSubject">
                            <i class="fas fa-trash"></i>
                          </button>                              
                        </td>
                        @endcan

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

      $('#deleteSubject').on('shown.bs.modal', function (event) {
      
        var button = $(event.relatedTarget)

        var sub_id = button.data('subid')
        var modal = $(this)

        modal.find('.modal-body #sub_id').val(sub_id);
    })
       
    </script> 

    @endsection

    </x-admin-master>