<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function __construct(){ 
        $this->middleware('auth');
    }
    
    public function index(){

        $users = User::all();
        return view('admin.user.index', ['users' => $users] );
    }

    public function show(User $user){
        return view('admin.user.profile', [
            'user'=>$user,
            'roles' => Role::all(),
            ]);
    }

    public function update(User $user){

        $data = request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
        ], [
            'name.max' => 'Họ và tên quá ký tự cho phép',
            'name.required' => 'Vui lòng nhập tên của bạn',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.unique' => 'Địa chỉ email này đã tồn tại',
            'email.email' => 'Địa chỉ email không hợp lệ',
        ]);

        $user->update($data);

        Session::flash('update', 'Cập nhật thông tin thành công.');

        return back();
    }

    public function attach(User $user){
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(request('role'));

        return back();
    }

    public function destroy(Request $request){
        
        $user = User::findOrFail($request->user_id);
        $user->delete();

        Session::flash('destroy', 'Người dùng đã được xóa khỏi hệ thống thành công');

        return back();

        
    }
}
