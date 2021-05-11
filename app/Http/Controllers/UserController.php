<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            // 'password' => ['string', 'min:8', 'confirmed'],
        ]);

        $user->update($data);

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

    public function destroy(User $user){
        $user->delete();

        Session::flash('delete-user', 'User was deleted');

        return back();
    }
}
