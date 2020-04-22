<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $guarded = [];



    public function path(){

    	#using $this because we are inside a model

    	return '/books/'. $this->id;

    }
}
