<?php
namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $roles = Role::all();
        return view('admin.role.index', ['roles' => $roles]);
    }

    public function store(){

        request()->validate([
            'name' => 'required|max:20|unique:roles,name',
        ], [
            'name.required' => 'Vui lòng điền tên',
            'name.max' => 'Độ dài tên không được vượt quá 20 ký tự',
            'name.unique' => 'Tên đã tồn tại'
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('_'),
        ]);

        Session::flash('create', 'Vai trò được tạo thành công');

        return back();
    }

    public function edit(Role $role){
        return view('admin.role.edit', [
            'role' => $role,
            // 'permissions' => Permission::all(),
            ]);
    }

    public function update(Role $role){

        request()->validate([
            'name' => ['required', 'max:20', Rule::unique('roles', 'name')->ignore($role)],
        ], [
            'name.required' => 'Vui lòng điền tên',
            'name.max' => 'Độ dài tên không được vượt quá 20 ký tự',
            'name.unique' => 'Tên đã tồn tại'
        ]);

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('_');

        $role->update();

        Session::flash('update', 'Thông tin vai trò đã được cập nhật thành công');

        return redirect()->route('roles.index');
        
    }

    public function destroy(Request $request){
        $role = Role::findOrFail($request->role_id);

        $role->delete();

        Session::flash('destroy', 'Vai trò đã được xóa thành công');

        return back();
    }
}
