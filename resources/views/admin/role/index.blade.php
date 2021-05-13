<x-admin-master>
@section('content')
<h2>Roles:</h2>

<div class="row">

    <div class="col-sm-3">

        <form method='post' action="{{route('role.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text"
                       name='name'
                       id='name' 
                       class="form-control @error('name') is-invalid @enderror">

                <div>
                    @error('name')
                        <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
            </div>  

            <button class='btn btn-primary btn-block'>Tạo</button>      
        
        </form>
    </div>

    <div class="col-sm-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Chức Năng</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Chức Năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($roles as $role)
                    <tr>
                      <td>{{$role->id}}</td>
                      <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>
                      <td>{{$role->slug}}</td>
                      <td>
                          <form action="{{route('role.destroy', $role->id)}}" method='post' enctype='multipart/form-data'>
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