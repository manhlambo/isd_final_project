<x-admin-master>
    @section('content')

    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    
    @elseif(Session::has('updated-message'))
    <div class="alert alert-success">{{Session::get('updated-message')}}</div>
    @elseif(Session::has('destroy-message'))
    <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
    
  @endif 
    
<h2>Quản Lý Môn Học</h2>   
 
    <div class="row">
    
        <div class="col-sm-3">
    
            <form method='post' action="{{ route('subject.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên môn học</label>
                    <input type="text"
                           name='name'
                           value="{{ old('name') }}"
                           id='name' 
                           class="form-control @error('name') is-invalid @enderror">
    
                    <div>
                        @error('name')
                            <span><strong style="color: red;">{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>  

                
                <div class="form-group">
                    <label for="assign">Giảng Viên</label>
                    <input type="text"
                           name='assign'
                           value="{{ old('assign') }}"
                           id='assign' 
                           class="form-control @error('assign') is-invalid @enderror">
    
                    <div>
                        @error('assign')
                            <span><strong style="color: red;">{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>
    
                <button class='btn btn-primary btn-block'>Tạo môn học</button>      
            
            </form>
        </div>
    
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tất cả môn học</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên</th>
                          <th>Giảng viên</th>
                          <th>Chức Năng</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($subjects as $subject)
                          <tr>
                            <td>{{ $subject->id }}</td>
                            <td><a href="{{ route('subject.edit', $subject->id) }}">{{ $subject->name }}</a></td>
                            <td>{{ $subject->assign }}</td>
                            <td>
                                <form action="{{ route('subject.destroy', $subject->id) }}" method='post' enctype='multipart/form-data'>
                                @csrf
                                @method('DELETE')
                                  <button type='submit' class="btn btn-danger">Xóa</button>
                                </form>
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
    @endsection
    </x-admin-master>