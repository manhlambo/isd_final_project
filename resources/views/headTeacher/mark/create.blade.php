<x-admin-master>
    
    @section('content')
    
    <div class="container">
    
        <form action="{{ route('mark.store', $subject) }}" method="post">
            <!-- validate data that come from the server or not -->
            @csrf 
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row"><h1>Thêm Điểm: {{ $subject->name }}</h1></div>

                    <div class="form-group row">
                        <label for="student_id" class="col-md-4 col-form-label">ID Học sinh</label>
                            
                            <input id="student_id" 
                            type="text" 
                            class="form-control @error('student_id') is-invalid @enderror" 
                            name="student_id" value="{{ old('student_id')  }}"  
                            autocomplete="student_id" autofocus>
    
                                @error('student_id')
                                        <strong style="color: red;">{{ $message }}</strong>
                                @enderror       
                    </div>
    
                    <div class="form-group row">
                        <label for="oral" class="col-md-4 col-form-label">Điểm Kiểm Tra Miệng</label>
                            
                            <input id="oral" 
                            type="text" 
                            class="form-control @error('oral') is-invalid @enderror" 
                            name="oral" value="{{ old('oral')}}"  
                            autocomplete="oral" autofocus readonly>
    
                                @error('oral')
                                        <strong>{{ $message }}</strong>
                                @enderror       
                    </div>


                    <div class="form-group row">
                        <label for="midterm" class="col-md-4 col-form-label">Điểm Kiểm Tra Giữa Kỳ</label>
                            
                            <input id="midterm" 
                            type="text" 
                            class="form-control @error('midterm') is-invalid @enderror" 
                            name="midterm" value="{{ old('midterm') }}"  autocomplete="midterm" autofocus readonly>
    
                                @error('midterm')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="form-group row">
                        <label for="final" class="col-md-4 col-form-label">Điểm Kiểm Tra Cuối Kỳ</label>
                            
                            <input id="final" 
                            type="text" 
                            class="form-control @error('final') is-invalid @enderror" 
                            name="final" value="{{ old('final') }}"  autocomplete="final" autofocus readonly>
    
                                @error('final')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror       
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Thêm Điểm</button>
                    </div>
    
                </div>
            </div>
        </form>
    </div> 
    
    @endsection
    </x-admin-master>