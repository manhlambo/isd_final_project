<x-admin-master>
@section('content')
<div class="container">

    <form action="{{ route('teacher.update', $teacher->id) }}" method="post">
        <!-- validate data that come from the server or not -->
        @csrf 
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row"><h1>Sửa thông tin giáo viên</h1></div>
                
                <div class="form-group row">
                    <label for="dob" class="col-md-4 col-form-label">Ngày sinh <small>(Tháng/Ngày/Năm)</small></label>
                        
                        <input id="dob" 
                        type="date" 
                        class="form-control @error('dob') is-invalid @enderror" 
                        name="dob" value="{{ old('dob') ?? $teacher->dob}}"  autocomplete="dob" autofocus>

                            @error('dob')
                                
                                    <strong>{{ $message }}</strong>
                                
                            @enderror       
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label">Số Điện Thoại</label>
                        
                        <input id="phone" 
                        type="tel" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        name="phone" value="{{ old('phone') ?? $teacher->phone }}"  autocomplete="phone" autofocus>

                            @error('phone')
                                
                                    <strong>{{ $message }}</strong>
                                
                            @enderror       
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Xác nhận</button>
                </div>

            </div>
        </div>
    </form>
</div> 
    
@endsection
</x-admin-master>