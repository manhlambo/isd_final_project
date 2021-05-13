<x-admin-master>
@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    
    @elseif(Session::has('post-created-message'))
    <div class="alert alert-success">{{Session::get('post-created-message')}}</div>
    @elseif(Session::has('post-updated-message'))
    <div class="alert alert-success">{{Session::get('post-updated-message')}}</div>
    

@endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Thông báo</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Người Đăng</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung</th>
                      <!-- <th>File đính kèm</th> -->
                      <th>Ngày tạo</th>
                      <th>Ngày sửa đổi</th>
                      <th>Chức Năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>Người Đăng</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung</th>
                      <!-- <th>File đính kèm</th> -->
                      <th>Ngày tạo</th>
                      <th>Ngày sửa đổi</th>
                      <th>Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->user->name}}</td>
                      <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                      <td>{{$post->content}}</td>
                      <!-- <td>{{$post->file}}</td> -->
                      <td>{{$post->created_at->diffForHumans()}}</td>
                      <td>{{$post->updated_at->diffForHumans()}}</td>
                      <td>
                          <form action="{{route('posts.destroy', $post->id)}}" method='post' enctype='multipart/form-data'>
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
@endsection

@section('scripts')
  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>

@endsection
</x-admin-master>