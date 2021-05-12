<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Str;


class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin.role.index', ['roles' => $roles]);
    }

    public function store(){
        // dd(request('name'));

        request()->validate([
            'name' => 'required | unique:roles,name',
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('_'),
        ]);

        return back();
    }

    public function edit(Role $role){
        return view('admin.role.edit', [
            'role' => $role,
            'permissions' => Permission::all(),
            ]);
    }

    public function update(Role $role){

        request()->validate([
            'name' => 'required | unique:roles,name',
        ]);

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('_');

        $role->update();

        return back();
        
    }

    public function destroy(Role $role){
        $role->delete();

        return back();
    }
}
