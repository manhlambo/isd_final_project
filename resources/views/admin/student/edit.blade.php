<x-admin-master>
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('student.update', $student->id) }}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Sửa thông tin học sinh</h1></div>
    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Họ và tên</label>
                            
                            <input id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') ?? $student->name }}"  
                            autocomplete="name" autofocus>
    
                                @error('name')
                                        <strong style="color: red;">{{ $message }}</strong>
                                @enderror       
                    </div>
    
    
                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label">Ngày sinh <small>(Tháng/Ngày/Năm)</small></label>
                            
                            <input id="dob" 
                            type="date" 
                            class="form-control @error('dob') is-invalid @enderror" 
                            name="dob" value="{{ old('dob') ?? $student->dob }}"  autocomplete="dob" autofocus>
    
                                @error('dob')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>
    
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label">Giới tính</label>
                            
                            <select id="gender" 
                            type="text" 
                            class="form-control @error('gender') is-invalid @enderror" 
                            name="gender" value="{{ old('gender') }}"  
                            autocomplete="gender" autofocus>

                            <option selected="true" disabled="disabled"> Hãy chọn giới tính </option>
                            <option {{old('student',$student->gender)=="Nam"? 'selected':''}}  value="Nam">Nam</option>
                            <option {{old('student',$student->gender)=="Nữ"? 'selected':''}}  value="Nữ">Nữ</option>
                            <option {{old('student',$student->gender)=="Không xác định"? 'selected':''}}  value="Không xác định">Không xác định</option>
                            </select>
                                @error('gender')
                                        <strong style="color: red;">{{ $message }}</strong>
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="parent_name" class="col-md-4 col-form-label">Họ và tên phụ huynh</label>
                            
                            <input id="parent_name" 
                            type="text" 
                            class="form-control @error('parent_name') is-invalid @enderror" 
                            name="parent_name" value="{{ old('parent_name') ?? $student->parent_name }}"  autocomplete="parent_name" autofocus>
    
                                @error('parent_name')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="parent_email" class="col-md-4 col-form-label">Địa chỉ email của phụ huynh</label>
                            
                            <input id="parent_email" 
                            type="text" 
                            class="form-control @error('parent_email') is-invalid @enderror" 
                            name="parent_email" value="{{ old('parent_email') ?? $student->parent_email}}"  autocomplete="parent_email" autofocus>
    
                                @error('parent_email')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    
    
                    <div class="form-group row">
                        <label for="parent_phone" class="col-md-4 col-form-label">Số Điện Thoại của phụ huynh</label>
                            
                            <input id="parent_phone" 
                            type="tel" 
                            class="form-control @error('parent_phone') is-invalid @enderror" 
                            name="parent_phone" value="{{ old('parent_phone') ?? $student->parent_phone}}"  autocomplete="parent_phone" autofocus>
    
                                @error('parent_phone')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="classroom_id" class="col-md-4 col-form-label">Lớp học (ID)</label>
                            
                            <input id="classroom_id" 
                            type="text" 
                            class="form-control @error('classroom_id') is-invalid @enderror" 
                            name="classroom_id" value="{{ old('classroom_id') ?? $student->classroom_id }}"  autocomplete="classroom_id" autofocus>
    
                                @error('classroom_id')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Sửa thông tin học sinh</button>
                    </div>
    
                </div>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Môn học: {{ $student->name }}</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="users-dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Lựa chọn</th>
                          <th>id</th>
                          <th>Tên môn học</th>
                          <th>Giảng viên</th>
                          <th>Gán</th>
                          <th>Bỏ Gán</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                          <td><input type="checkbox"
                                @foreach ($student->subjects as $s_subject)
                                    @if ($s_subject->name == $subject->name)
                                        checked
                                    @endif
                                @endforeach
                            ></td>
                          <td>{{ $subject->id }}</td>
                          <td>{{ $subject->name }}</td>
                          <td>{{ $subject->assign }}</td>
                          <td>
                            @if (auth()->user()->userHasRole('Admin'))
                                <form action="{{ route('student.subject.attach', $student) }}" method='post'>
                                  @csrf
                                  @method('PATCH')
                                  
                                  <input type="hidden" name='subject' value='{{ $subject->id }}'>
        
                                  <button type='submit'
                                          class="btn btn-success btn-circle btn-sm"
                                          @if ($student->subjects->contains($subject))
                                              disabled
                                          @endif
                                          ><i class="fas fa-check"></i></button>
                                </form>
                            @endif
                          </td>
                          <td>
                              @if (auth()->user()->userHasRole('Admin'))
                                  <form action="{{ route('student.subject.detach', $student) }}" method='post'>
                                    @csrf
                                    @method('PATCH')
                                    
                                    <input type="hidden" name='subject' value='{{ $subject->id }}'>
          
                                    <button type='submit'
                                            class="btn btn-danger btn-circle btn-sm"
                                            @if (!$student->subjects->contains($subject))
                                                disabled
                                            @endif
                                            ><i class="fas fa-trash"></i></button>
          
                                  </form>
                              @endif
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

    </div> 
    @endsection
    </x-admin-master>