<x-admin-master>
@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    
    @elseif(Session::has('post-created-message'))
    <div class="alert alert-success">{{Session::get('post-created-message')}}</div>
    @elseif(Session::has('post-updated-message'))
    <div class="alert alert-success">{{Session::get('post-updated-message')}}</div>
    

@endif

    <!-- Modal -->
    <div class="modal modal-danger fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" >Xác nhận xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="/posts/{post}" method='post' >
            @csrf
            @method('DELETE')
              <div class="modal-body">
                <p>
                  <b>Khi xóa thông báo, toàn bộ thông tin về thông báo sẽ bị xóa vĩnh viễn khỏi hệ thống.
                  <br> 
                  <br>
                  Hãy kiểm tra kỹ thông báo trước khi xóa.
                  </b>
                </p>

                <input type="hidden" name='post_id' id='post_id' value=''>

              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-success btn-icon-split" data-dismiss="modal"> 
                  <span class="icon text-white-50">
                    <i class="fas fa-window-close"></i>
                  </span>
                  <span class="text">Hủy</span>
                </button>

                <button type="submit" class="btn btn-danger btn-circle ">
                  <i class="fas fa-trash"></i>
                </button>
                
              </div>

         </form>

        </div>
      </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3" style="display:flex; justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Thông báo</h6>

        @can('create', App\Post::class)

            <a href="{{route('posts.create')}}" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
              </span>
              <span class="text">Tạo thông báo</span>
            </a>
        @endcan

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Người Đăng</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa đổi</th>
                <th> Xóa</th>
              
              </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{isset($post->user) ? $post->user->name: 'N/a'}}</td>
                <td>
                  @can('update', $post)
                      <a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a>
                  @endcan

                  @cannot('update', $post)
                      {{$post->title}}
                  @endcannot
                </td>
                <td>{{Str::limit($post->content, '10', '...')}}</td>
                <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                <td>{{date('d-m-Y', strtotime($post->updated_at))}}</td>
                <td>
                  @can('delete', $post)
                  <button class="btn btn-danger btn-circle btn-sm" data-postid={{ $post->id }} data-toggle="modal" data-target="#deletePost">
                    <i class="fas fa-trash"></i>
                  </button>
                  @endcan
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

  <script>
      $('#deletePost').on('shown.bs.modal', function (event) {
  
        var button = $(event.relatedTarget)

        var post_id = button.data('postid')
        var modal = $(this)

        modal.find('.modal-body #post_id').val(post_id);
      })
  </script>

@endsection
</x-admin-master>