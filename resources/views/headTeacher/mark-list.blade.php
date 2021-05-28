<x-admin-master>
    @section('content')
    
      @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        
        @elseif(Session::has('updated-message'))
        <div class="alert alert-success">{{Session::get('updated-message')}}</div>
        @elseif(Session::has('destroy-message'))
        <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
        
      @endif 
<h2>{{ $student->name }} - ID: {{ $student->id }} - Lớp: {{ $student->classroom->grade.$student->classroom->name }}
    - Chủ nhiệm: {{ $student->classroom->teacher->user->name }}
</h2>

      {{-- {{ Bảng môn học }} --}}
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Môn đang học: </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên môn học</th> 
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên môn học</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach ($student->subjects as $s_subject)
                <tr>
                  <td>{{ $s_subject->id }}</td>  
                  <td><a href="{{ route('mark.create', $s_subject) }}">{{ $s_subject->name }}</a></td>                      
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Tên môn học</th>
                          <th>Điểm kiểm tra miệng</th>
                          <th>Điểm kiểm tra giữa kỳ</th>
                          <th>Điểm kiểm tra cuối kỳ</th>
                          <th>Điểm trung bình</th> 
                          <th></th>  
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Tên môn học</th>
                            <th>Điểm kiểm tra miệng</th>
                            <th>Điểm kiểm tra giữa kỳ</th>
                            <th>Điểm kiểm tra cuối kỳ</th>
                            <th>Điểm trung bình</th>
                            <th></th>    
                        </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($student->marks as $s_mark)
                        <tr>
                          <td><a href="{{ route('mark.edit', $s_mark) }}">{{ $s_mark->subject->name }}</a></td>
                          <td>{{ $s_mark->oral }}</td>
                          <td>{{ $s_mark->midterm }}</td>
                          <td>{{ $s_mark->final }}</td>
                          <td><b>{{ $s_mark->overall }}</b></td>
                          <td>
                            <form action="{{ route('mark.compute', $s_mark) }}" method='post' enctype='multipart/form-data'>
                              @csrf
                              @method('PATCH')
                                <button type='submit' class="btn btn-success">Tính điểm</button>
                              </form>
                          </td>
                        </tr>                         
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div>
              <a href="{{route('mark.email', $student)}}">Gửi email</a></div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    {{-- <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
  
    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script> --}}
    @endsection

    </x-admin-master>