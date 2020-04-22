<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    //
    public function store(){

    	// $data = request()->validate([

    	// 	'author' => 'required',
    	// 	'dob' => 'required',

    	// ]);

    	Author::create(request()->only([

    		'name', 'dob',

    	]));

    }
}
