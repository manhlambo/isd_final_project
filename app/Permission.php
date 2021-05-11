<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class Permission extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
