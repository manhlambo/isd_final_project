<x-admin-master>

@section('content')
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" >
    <!-- validate data that come from the server or not -->
    @csrf 
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row"><h1>Thêm thông báo</h1></div>

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Tiêu đề</label>   
                <input id="title" 
                type="text" 
                class="form-control @error('title') is-invalid @enderror" 
                name="title" value="{{ old('title') }}"  
                autocomplete="title" autofocus>
                @error('title')
                    <strong>{{ $message }}</strong>
                @enderror       
            </div>

            <div class="row">
                <label for="content" class="col-md-4 col-form-label">Nội dung</label>  
                    <textarea id="content" 
                    type="text" 
                    class="form-control @error('content') is-invalid @enderror" 
                    name="content" value="{{ old('content') }}"  autocomplete="content" autofocus
                    cols='30'
                    rows='10'></textarea>
                    @error('content')
                            <strong>{{ $message }}</strong>
                    @enderror       
            </div>

            <div class="row">
                <label for="file">File</label>
                <input type="file"
                        name="file"
                        class="form-control-file"
                        id="file">
            </div>
         
            <div class="row pt-4">
                <button class="btn btn-primary">Thêm thông báo</button>
            </div>

            </div>
        </div>
    </form>

@endsection
</x-admin-master>