<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClassRoom;

class Student extends Model
{
    protected $guarded = [];

    public function classroom(){
        return $this->belongsTo(ClassRoom::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }

    public function marks(){
        return $this->hasMany(Mark::class);
    }
}
