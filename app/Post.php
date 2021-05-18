<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function show_time() {
        if ($this->created_at->diffInDays() > 30) {
            return $this->created_at->toFormattedDateString();
        
        // Else get the difference for humans
        } else {
            return $this->created_at->diffForHumans();
        }
    }
   
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
