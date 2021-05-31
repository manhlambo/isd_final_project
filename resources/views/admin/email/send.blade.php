<!DOCTYPE html>
<html lang="en">

<body>
    
    <form action="" method="post" role="form">
        <h1 color="black" style='text-align: center;'>Thông báo kết quả học tập</h1>
        <!-- Student Profile Details -->
        <div class="col-lg-8" position="rea">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Thông tin học sinh</h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table table-bordered">

                        <tr>
                            <th width="50%">Họ và tên</th>
                            <td width="2%">:</td>
                            <td>{{$name}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Ngày sinh</th>
                            <td width="2%">:</td>
                            <td>{{date('d-m-Y', Strtotime($dob))}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Lớp </th>
                            <td width="2%">:</td>
                            <td>{{$class}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Giáo viên chủ nhiệm </th>
                            <td width="2%">:</td>
                            <td>{{$teacher}}</td>
                        </tr>

                        
                        <th width="50%">Email giáo viên</th>
                            <td width="2%">:</td>
                            <td>{{ $teacher_email }}</td>
                        </tr>


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


                        <tr>
                            <th width="50%"><b>Nhận xét của giáo viên</b></th>
                            <td width="2%">:</td>
                            <td>{{ $body }}</td>
                        </tr>


                    </table>


            
            </div>

        </div>

    </form>


</body>
