<x-admin-master>
@section('content')

    <form action="{{route('role.update', $role->id)}}" method="post" enctype="multipart/form-data" >
        <!-- validate data that come from the server or not -->
        @csrf 
        @method("PATCH")
        <div class="row">
            <div class="col-8 offset-1">
                <div class="row"><h2>Cập nhật quyền</h2></div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label"></label>   
                    <input id="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') ?? $role->name}}"  
                    autocomplete="name" autofocus>
                    @error('name')
                        <strong style="color: red;" >{{ $message }}</strong>
                    @enderror       
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Cập nhật</button>
                </div>

                </div>
            </div>
        </form>


        <div class="col-10">
        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Options</th>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Options</th>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($permissions as $permission)
                    <tr>
                      <td><input type="checkbox"
                            @foreach($role->permissions as $role_permission)
                                @if($role_permission->slug == $permission->slug)
                                    checked
                                @endif
                            @endforeach
                            ></td>
                      <td>{{$permission->id}}</td>
                      <td>{{$permission->name}}<a href=""></a></td>
                      <td>{{$permission->slug}}</td>
                      <td>
                          <form action="" method='post' enctype='multipart/form-data'>
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



    </div> --}}

  </div>
  














@endsection
</x-admin-master>