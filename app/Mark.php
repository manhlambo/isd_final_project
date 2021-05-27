<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $guarded = [];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
