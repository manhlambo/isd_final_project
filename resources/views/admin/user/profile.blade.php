<x-admin-master>


    @section('content')

        <h2>Thông tin người dùng: {{$user->name}} - ID: {{ $user->id }}</h2>


       <div class="row">

               <div class="col-sm-6">

                       <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                               @csrf
                               @method('PATCH')

                               <div class="form-group">
                                       <label for="name">Tên</label>
                                       <input type="text"
                                              name="name"
                                              class="form-control @error('name') is-invalid @enderror"
                                              id="name"
                                              value="{{$user->name}}"
                                       >

                                       @error('name')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>

                               <div class="form-group">
                                       <label for="email">Địa chỉ email</label>
                                       <input type="text"
                                              name="email"
                                              class="form-control @error('email') is-invalid @enderror"
                                              id="email"
                                              value="{{$user->email}}"
                                       >

                                       @error('email')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>

                               <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                       </form>

               </div>

       </div>
<hr>

<div class="row">
        <div class="col-sm-12">
                <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Vai trò:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="users-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Lựa chọn</th>
                      <th>ID</th>
                      <th>Vai trò</th>
                      <th>Chức năng</th>
                      <th>Chức năng</th>
                    </tr>
                  </thead>
                  {{-- <tfoot>
                    <tr>
                      <th>Lựa chọn</th>
                      <th>ID/th>
                      <th>Vai trò</th>
                      <th>Gán</th>
                      <th>Bỏ gắn</th>
                    </tr>
                  </tfoot> --}}
                  <tbody>
                    @foreach($roles as $role)
                    <tr>
                      <td><input type="checkbox"
                                @foreach($user->roles as $user_role)
                                        @if($user_role->slug == $role->slug)
                                                checked
                                        @endif
                                @endforeach
                        ></td>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                        <td>
                        <form action="{{route('user.role.attach', $user->id)}}" method='post'>
                          @csrf
                          @method('PATCH')
                          
                          <input type="hidden" name='role' value='{{$role->id}}'>

                          <button type='submit'
                                  class="btn btn-primary"
                                  @if($user->roles->contains($role))
                                    disabled
                                  @endif
                                  >Gán</button>

                        </form>
                      </td>
                      <td>
                        <form action="{{route('user.role.detach', $user->id)}}" method='post'>
                          @csrf
                          @method('PATCH')
                          
                          <input type="hidden" name='role' value='{{$role->id}}'>

                          <button type='submit'
                                  class="btn btn-danger"
                                  @if(!$user->roles->contains($role))
                                    disabled
                                  @endif
                                  >Bỏ gán</button>

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