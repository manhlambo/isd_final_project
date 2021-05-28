
<!DOCTYPE html>
<html lang="en">

<body>
    
    <form action="" method="post" role="form">
        <h1 color="black">Thông báo kết quả học tập</h1>
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
                            <td>{{$dob}}</td>
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








                        <tr>
                            <th width="50%">Nhận xét của giáo viên</th>
                            <td width="2%">:</td>
                            <td>{{ $body }}</td>
                        </tr>


                    </table>


            
            </div>

        </div>

    </form>


</body>
