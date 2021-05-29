<x-admin-master>
@section('content')

<form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data" >
    <!-- validate data that come from the server or not -->
    @csrf 
    @method("PATCH")
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row"><h1>Sửa thông báo</h1></div>

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Tiêu đề</label>   
                <input id="title" 
                type="text" 
                class="form-control @error('title') is-invalid @enderror" 
                name="title" value="{{ old('title') ?? $post->title}}"  
                autocomplete="title" autofocus>
                @error('title')
                    <strong style="color: red;">{{ $message }}</strong>
                @enderror       
            </div>

            <div class="row">
                <label for="content" class="col-md-4 col-form-label">Nội dung</label>  
                    <textarea id="content" 
                    type="text" 
                    class="form-control @error('content') is-invalid @enderror" 
                    name="content" value="{{ old('content')}}"  autocomplete="content" autofocus
                    cols='30'
                    rows='10'>{{$post->content}}</textarea>
                    @error('content')
                            <strong style="color: red;">{{ $message }}</strong>
                    @enderror       
            </div>


         
            <div class="row pt-4">
                <button class="btn btn-primary">Sửa thông báo</button>
            </div>

            </div>
        </div>
    </form>
@endsection
</x-admin-master>