<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //OPTION 1
    public static function scopeIncomplete($query) {
      return $query->where('completed', 0);
    }


}
