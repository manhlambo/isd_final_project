<x-admin-master>
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('classroom.update', $classroom->id) }}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Sửa thông tin lớp học</h1></div>
    
                    <div class="form-group row">
                        <label for="grade" class="col-md-4 col-form-label">Khối</label>
                            
                            <select id="grade" 
                            type="text" 
                            class="form-control @error('grade') is-invalid @enderror" 
                            name="grade" value="{{ old('grade') }}"  
                            autocomplete="grade" autofocus>

                            <option selected="true" disabled="disabled"> Hãy chọn khối </option>
                            <option {{old('classroom',$classroom->grade)=="1"? 'selected':''}}  value="1">1</option>
                            <option {{old('classroom',$classroom->grade)=="2"? 'selected':''}}  value="2">2</option>
                            <option {{old('classroom',$classroom->grade)=="3"? 'selected':''}}  value="3">3</option>
                            <option {{old('classroom',$classroom->grade)=="4"? 'selected':''}}  value="4">4</option>
                            <option {{old('classroom',$classroom->grade)=="5"? 'selected':''}}  value="5">5</option>
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

                            <option selected="true" disabled="disabled"> {{ $classroom->name }} </option>
                            <option {{old('classroom',$classroom->name)=="A"? 'selected':''}}  value="A">A</option>
                            <option {{old('classroom',$classroom->name)=="B"? 'selected':''}}  value="B">B</option>
                            <option {{old('classroom',$classroom->name)=="C"? 'selected':''}}  value="C">C</option>
                            <option {{old('classroom',$classroom->name)=="D"? 'selected':''}}  value="D">D</option>
                            <option {{old('classroom',$classroom->name)=="E"? 'selected':''}}  value="E">E</option>
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
                            name="teacher_id" value="{{ old('teacher_id') ?? $classroom->teacher->id ?? '' }}"  autocomplete="teacher_id" autofocus>
                                @error('teacher_id')
                                    
                                        <strong style="color: red;">{{ $message }}</strong>
                                    
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