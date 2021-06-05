<x-admin-master>
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('student.store', $classroom)}}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Thêm học sinh</h1></div>
    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Họ và tên</label>
                            
                            <input id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}"  
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
                            name="dob" value="{{ old('dob') }}"  autocomplete="dob" autofocus>
    
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
                            <option>Nam</option>
                            <option>Nữ</option>
                            <option>Không xác định</option> 
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
                            name="parent_name" value="{{ old('parent_name') }}"  autocomplete="parent_name" autofocus>
    
                                @error('parent_name')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="parent_email" class="col-md-4 col-form-label">Địa chỉ email của phụ huynh</label>
                            
                            <input id="parent_email" 
                            type="text" 
                            class="form-control @error('parent_email') is-invalid @enderror" 
                            name="parent_email" value="{{ old('parent_email') }}"  autocomplete="parent_email" autofocus>
    
                                @error('parent_email')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    
    
                    <div class="form-group row">
                        <label for="parent_phone" class="col-md-4 col-form-label">Số Điện Thoại của phụ huynh</label>
                            
                            <input id="parent_phone" 
                            type="tel" 
                            class="form-control @error('parent_phone') is-invalid @enderror" 
                            name="parent_phone" value="{{ old('parent_phone') }}"  autocomplete="parent_phone" autofocus>
    
                                @error('parent_phone')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    {{-- <div class="form-group row">
                        <label for="classroom_id" class="col-md-4 col-form-label">Lớp học (ID)</label>
                            
                            <input id="classroom_id" 
                            type="text" 
                            class="form-control @error('classroom_id') is-invalid @enderror" 
                            name="classroom_id" value="{{ old('classroom_id') }}"  autocomplete="classroom_id" autofocus>
    
                                @error('classroom_id')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div> --}}
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Thêm học sinh</button>
                    </div>
    
                </div>
            </div>
        </form>
    </div> 
    
    
    
    @endsection
    </x-admin-master>