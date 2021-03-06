<x-admin-master>
@section('content')

<x-admin-alert/>

    <form action="" method="post" role="form">
    {{ csrf_field() }}
        <h1 style='text-align: center;' color="black" >Thông báo kết quả học tập</h1>

        <hr>

        <!-- Student Profile Details -->
        <div class="col-lg-8" position="rea">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="fas fa-user-graduate"></i>&nbsp;Thông tin học sinh</h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table table-bordered" >

                        <tr>
                            <th width="50%">Họ và tên</th>
                            <td width="2%">:</td>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Ngày sinh</th>
                            <td width="2%">:</td>
                            <td>{{date('d-m-Y', Strtotime($student->dob))}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Lớp </th>
                            <td width="2%">:</td>
                            <td>{{$student->classroom->grade.$student->classroom->name}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Họ tên phụ huynh học sinh </th>
                            <td width="2%">:</td>
                            <td>{{$student->parent_name}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Giáo viên chủ nhiệm </th>
                            <td width="2%">:</td>
                            <td>{{$student->classroom->teacher->user->name}}</td>
                        </tr>

                        <tr>
                            <th width="50%">Email giáo viên chủ nhiệm</th>
                            <td width="2%">:</td>
                            <td>{{$student->classroom->teacher->user->email}}</td>
                        </tr>

                    </table>

                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Tên môn học</th>
                          <th>Điểm kiểm tra miệng</th>
                          <th>Điểm kiểm tra giữa kỳ</th>
                          <th>Điểm kiểm tra cuối kỳ</th>
                          <th>Điểm trung bình</th> 
                        </tr>
                      </thead>

                      <tbody>
                          @foreach($student->marks as $s_mark)
                        <tr>
                          <td>{{$s_mark->subject->name}}</td>
                          <td>{{$s_mark->oral}}</td>
                          <td>{{$s_mark->midterm}}</td>
                          <td>{{$s_mark->final}}</td>
                          <td><b>{{$s_mark->overall}}</b></td>
                        </tr>  
                         @endforeach
                      </tbody>
                    </table>

                    <div class="form-group">
                        <label for=""><b>Nhận xét của giáo viên:</b></label>
                        <textarea name="body" placeholder="Nhận xét ở đây" class="form-control" rows="5"></textarea>
                    </div>
                </div>
            
            </div>

           <div style='text-align: center;'>
                <button type="submit" class='btn btn-light btn-icon-split' >
                    <span class="icon text-white-50">
                        <i class="far fa-paper-plane"></i>
                    </span>
                    <span class="text">Gửi email</span>
                </button>
           </div>

        </div>

    </form>

@endsection
</x-admin-master>