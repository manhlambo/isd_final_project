<x-admin-master>
@section('content')

<div class="container">

    <form action="{{route('teacher.store')}}" method="post">
        <!-- validate data that come from the server or not -->
        @csrf 
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row"><h1>Thêm giáo viên</h1></div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">ID Người dùng</label>
                        
                        <input id="user_id" 
                        type="text" 
                        class="form-control @error('user_id') is-invalid @enderror" 
                        name="user_id" value="{{ old('user_id') }}"  
                        autocomplete="user_id" autofocus>

                            @error('user_id')
                                    <strong>{{ $message }}</strong>
                            @enderror       
                </div>


                <div class="form-group row">
                    <label for="dob" class="col-md-4 col-form-label">Ngày sinh <small>(Tháng/Ngày/Năm)</small></label>
                        
                        <input id="dob" 
                        type="date" 
                        class="form-control @error('dob') is-invalid @enderror" 
                        name="dob" value="{{ old('dob') }}"  autocomplete="dob" autofocus>

                            @error('dob')
                                
                                    <strong>{{ $message }}</strong>
                                
                            @enderror       
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label">Số Điện Thoại</label>
                        
                        <input id="phone" 
                        type="tel" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                            @error('phone')
                                
                                    <strong>{{ $message }}</strong>
                                
                            @enderror       
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Thêm giáo viên</button>
                </div>

            </div>
        </div>
    </form>
</div> 



@endsection
</x-admin-master>