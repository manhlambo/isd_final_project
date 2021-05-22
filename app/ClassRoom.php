<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class ClassRoom extends Model
{
    protected $guarded = [];
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function students(){
        return $this->hasMany(Student::class, 'classroom_id');
    }
}
