<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //we accept
    //protected $fillable = ['title','body'] ;

    //opposite of above
    protected $guarded = [];
}
