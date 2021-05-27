<x-admin-master>
    @section('content')
    
        <form action="{{ route('subject.update', $subject->id) }}" method="post" enctype="multipart/form-data" >
            <!-- validate data that come from the server or not -->
            @csrf 
            @method("PATCH")
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row"><h2>Sửa thông tin môn học</h2></div>

                    <div class="form-group">
                        <label for="name">Tên môn học</label>
                        <input type="text"
                               name='name'
                               value="{{ old('name') ?? $subject->name }}"
                               id='name' 
                               class="form-control @error('name') is-invalid @enderror">
        
                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>  
    
                    
                    <div class="form-group">
                        <label for="assign">Giảng Viên</label>
                        <input type="text"
                               name='assign'
                               value="{{ old('assign') ?? $subject->assign }}"
                               id='assign' 
                               class="form-control @error('assign') is-invalid @enderror">
        
                        <div>
                            @error('assign')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Xác nhận</button>
                    </div>
    
                    </div>
                </div>
            </form>
    @endsection
    </x-admin-master>