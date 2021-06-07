<x-admin-master>
    @section('content')
    
      @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        
        @elseif(Session::has('updated-message'))
        <div class="alert alert-success">{{Session::get('updated-message')}}</div>
        @elseif(Session::has('destroy-message'))
        <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
        @elseif(Session::has('email'))
        <div class="alert alert-danger">{{Session::get('email')}}</div>
        
      @endif 
<h2>{{ $student->name }} - ID: {{ $student->id }} - Lớp: {{ isset($student->classroom) ? $student->classroom->grade.$student->classroom->name: 'N/a' }}
    - Chủ nhiệm: {{ isset($student->classroom->teacher) ? $student->classroom->teacher->user->name: 'N/a' }}
</h2>

<hr>

    <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteMark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/marks/{mark}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa điểm, toàn bộ các dữ liệu bao gồm điểm của học sinh đều sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông tin điểm trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='mark_id' id='mark_id' value=''>

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

      {{-- {{ Bảng môn học }} --}}
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Môn đang học: </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class='thead-light'>
                <tr>
                  <th>ID</th>
                  <th>Tên môn học</th> 
                </tr>
              </thead>

              <tbody>
                  @foreach ($student->subjects as $s_subject)
                <tr>
                  <td>{{ $s_subject->id }}</td>  
                  <td>
                    @can('create', App\Mark::class)
                    <a href="{{ route('mark.create', $s_subject) }}" >
                      {{ isset($s_subject) ? $s_subject->name: "Môn học đã bị xóa" }}
                    </a>
                    @endcan

                    @cannot('create', App\Mark::class)
                      {{ isset($s_subject) ? $s_subject->name: "Môn học đã bị xóa" }}
                    @endcannot


                  </td>                      
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

              <!-- Bảng Điểm -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tất Cả Điểm:</h6>
                </div>
                <div class="card-body">
                
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead class='thead-light'>
                        <tr>
                          <th>Tên môn học</th>
                          <th>Điểm kiểm tra miệng</th>
                          <th>Điểm kiểm tra giữa kỳ</th>
                          <th>Điểm kiểm tra cuối kỳ</th>
                          <th>Điểm trung bình</th> 
                          <th>Tính Điểm</th>  
                          <th>Xóa</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($student->marks as $s_mark)
                        <tr>
                          <td>
                            @can('update', $s_mark)
                                <a href="{{ route('mark.edit', $s_mark) }}">
                                  {{ isset($s_mark->subject) ? $s_mark->subject->name: 'Môn học đã bị xóa' }}
                                </a>
                            @endcan

                            @cannot('update', $s_mark)
                              {{ isset($s_mark->subject) ? $s_mark->subject->name: 'Môn học đã bị xóa' }}
                            @endcannot


                          </td>
                          <td>{{ $s_mark->oral }}</td>
                          <td>{{ $s_mark->midterm }}</td>
                          <td>{{ $s_mark->final }}</td>
                          <td><b>{{ $s_mark->overall }}</b></td>
                          <td>
                            @can('update', $s_mark)
                              <form action="{{ route('mark.compute', $s_mark) }}" method='post' enctype='multipart/form-data'>
                                @csrf
                                @method('PATCH')
                                <button type='submit' class="btn btn-success btn-circle btn-sm">
                                  <i class="fas fa-calculator"></i>
                                </button>
                              </form>
                            @endcan
                          </td>

                          <td>
                            @can('delete', $s_mark)
                            <button class="btn btn-danger btn-circle btn-sm" data-markid={{ $s_mark->id }} data-toggle="modal" data-target="#deleteMark">
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
              <div>

              @foreach ($student->marks as $s_mark)
                  @can('update', $s_mark)
                  <a href="{{route('mark.email', $student)}}" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="far fa-paper-plane"></i>
                    </span>
                    <span class="text">Gửi email cho phụ huynh</span>
                  </a>
                  @endcan
                  @break
              @endforeach


    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    {{-- <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
  
    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script> --}}

    <script>

      $('#deleteMark').on('shown.bs.modal', function (event) {
      
        var button = $(event.relatedTarget)
  
        var mark_id = button.data('markid')
        var modal = $(this)
  
        modal.find('.modal-body #mark_id').val(mark_id);
    })
       
    </script> 
    @endsection

    </x-admin-master>