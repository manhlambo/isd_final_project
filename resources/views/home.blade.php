<x-home-master>
  
  @section('content')
  
  @foreach($posts as $post)
  
  <div class="post" style="display: flex; margin-bottom: 2em; border: 1px solid black; border-radius: 15px; padding: 2em;">
  
  
        <div class="avatar" style="margin-right: 1em;">
            <img src="{{asset('homepage/images/user-6-128x128.png')}}" alt="" class="post-image" style="height: 64px; width: 64px;">
        </div>
  
        <div class="post-preview">
            <h2><a href="" style="color: #E07C24; text-decoration: none;">{{$post->title}}</a></h2>
            <i class="user" style="color: #E07C24;">Được đăng bởi <b>{{isset($post->user) ? $post->user->name: 'N/a'}}</b></i>
            &nbsp;
            <i class="calendar" style="color: #E07C24;">- {{ date('d-m-Y', Strtotime($post->updated_at)) }} </i>
            <p class="preview-text">
              {{ Str::limit($post->content, '100', '...') }}
            </p>
            <a href="{{route('posts.show', $post->id)}}" class="btn-readmore">Đọc tiếp</a>
            <!-- <img src="{{asset('homepage/images/file_10-128.png')}}" alt="excel" class="attachments" style="height: 64px; width: 64px;">  -->
            <!-- <a href="">file.xls</a>  -->
        </div>

    </div>
    @endforeach

    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
    
  @endsection
  </x-home-master>
  
