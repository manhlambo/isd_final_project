<x-home-master>
  @section('content')
  
  @foreach($posts as $post)
  
  <div class="post" style="display: flex; margin-bottom: 2em; border: 1px solid black; border-radius: 15px; padding: 2em;">
  
  
        <div class="avatar" style="margin-right: 1em;">
            <img src="{{asset('homepage/images/user-6-128x128.png')}}" alt="" class="post-image" style="height: 64px; width: 64px;">
        </div>
  
        <div class="post-preview">
            <h2><a href="" style="color: #E07C24; text-decoration: none;">{{$post->title}}</a></h2>
            <i class="user" style="color: #E07C24;">Được đăng bởi <b>{{$post->user->name}}</b></i>
            &nbsp;
            <i class="calendar" style="color: #E07C24;">- {{ $post->show_time() }} </i>
            <p class="preview-text">
              {{$post->content}}
            </p>
            <a href="{{route('posts.show', $post->id)}}" class="btn-readmore">Read More</a>
            <!-- <img src="{{asset('homepage/images/file_10-128.png')}}" alt="excel" class="attachments" style="height: 64px; width: 64px;">  -->
            <!-- <a href="">file.xls</a>  -->
        </div>
    </div>
    @endforeach
  
  @endsection
  </x-home-master>
  
