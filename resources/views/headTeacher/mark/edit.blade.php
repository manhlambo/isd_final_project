<x-admin-master>
    
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('mark.update', $mark) }}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Cập Nhật Điểm: {{ $mark->subject->name }}</h1></div>

                    <div class="form-group row">
                        <label for="student_id" class="col-md-4 col-form-label">ID Học sinh</label>
                            
                            <input id="student_id" 
                            type="text" 
                            class="form-control @error('student_id') is-invalid @enderror" 
                            name="student_id" value="{{ old('student_id') ?? $mark->student_id }}"  
                            autocomplete="student_id" autofocus readonly>
    
                                @error('student_id')
                                        <strong>{{ $message }}</strong>
                                @enderror       
                    </div>
    
                    <div class="form-group row">
                        <label for="oral" class="col-md-4 col-form-label">Điểm Kiểm Tra Miệng</label>
                            
                            <input id="oral" 
                            type="text" 
                            class="form-control @error('oral') is-invalid @enderror" 
                            name="oral" value="{{ old('oral') ?? $mark->oral}}"  
                            autocomplete="oral" autofocus>
    
                                @error('oral')
                                        <strong>{{ $message }}</strong>
                                @enderror       
                    </div>


                    <div class="form-group row">
                        <label for="midterm" class="col-md-4 col-form-label">Điểm Kiểm Tra Giữa Kỳ</label>
                            
                            <input id="midterm" 
                            type="text" 
                            class="form-control @error('midterm') is-invalid @enderror" 
                            name="midterm" value="{{ old('midterm') ?? $mark->midterm}}"  autocomplete="midterm" autofocus>
    
                                @error('midterm')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="final" class="col-md-4 col-form-label">Điểm Kiểm Tra Cuối Kỳ</label>
                            
                            <input id="final" 
                            type="text" 
                            class="form-control @error('final') is-invalid @enderror" 
                            name="final" value="{{ old('final') ?? $mark->final}}"  autocomplete="final" autofocus>
    
                                @error('final')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Sửa Điểm</button>
                    </div>
    
                </div>
            </div>
        </form>
    </div> 
    
    @endsection
    </x-admin-master>