<x-home-master>
@section('content')

<div class="post">

@foreach($posts as $post)
  <img src="{{asset('homepage/images/user-6-128x128.png')}}" alt="" class="post-image">
  <div class="post-preview">
    <h2><a href="">{{$post->title}}</a></h2>
    <i class="user">Được đăng bởi <b>{{$post->user->name}}</b></i>
    &nbsp;
    <i class="calendar">- Thursday, 4 February 2021, 3:30PM </i>
    <p class="preview-text">
      {{$post->content}}
    </p>
    <a href="{{route('posts.show', $post->id)}}" class="btn">Read More</a>
    <img src="{{asset('homepage/images/file_10-128.png')}}" alt="excel" class="attachments"> <a href="">file.xls</a> 
  </div>
  </div>
  @endforeach

@endsection
</x-home-master>

