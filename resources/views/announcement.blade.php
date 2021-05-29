<x-home-master>
@section('content')

<!-- Title -->
<h1 class="mt-4">{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p>Đăng vào {{ date('d-m-Y', Strtotime($post->updated_at)) }}</p>

<hr>

<!-- Post Content -->
<p class="lead">{{ $post->content }}</p>



<hr>

@endsection
</x-home-master>