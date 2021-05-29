<x-admin-master>
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('classroom.store') }}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Thêm lớp học</h1></div>
    
                    <div class="form-group row">
                        <label for="grade" class="col-md-4 col-form-label">Khối</label>
                            
                            <select id="grade" 
                            type="text" 
                            class="form-control @error('grade') is-invalid @enderror" 
                            name="grade" value="{{ old('grade') }}"  
                            autocomplete="grade" autofocus>

                            <option selected="true" disabled="disabled"> Hãy chọn khối </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option> 
                                <option>4</option>    
                                <option>5</option> 
                            </select>

                                @error('grade')
                                        <strong style="color: red;">{{ $message }}</strong>
                                @enderror       
                    </div>
    
    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Tên lớp</label>
                            
                            <select id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            <option selected="true" disabled="disabled"> Hãy chọn tên lớp </option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option> 
                                <option>D</option>    
                                <option>E</option> 
                            </select>

                                @error('name')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>
    
                    <div class="form-group row">
                        <label for="teacher_id" class="col-md-4 col-form-label">Giáo viên chủ nhiệm (ID)</label>
                            
                            <input id="teacher_id" 
                            type="tel" 
                            class="form-control @error('teacher_id') is-invalid @enderror" 
                            name="teacher_id" value="{{ old('teacher_id') }}"  autocomplete="teacher_id" autofocus>
    
                                @error('teacher_id')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
                                @enderror       
                    </div>
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Thêm lớp học</button>
                    </div>
    
                </div>
            </div>
        </form>
    </div> 
    
    
    
    @endsection
    </x-admin-master>