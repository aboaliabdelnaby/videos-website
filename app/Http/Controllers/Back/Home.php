<?php

namespace App\Http\Controllers\Back;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
class Home extends BackController
{
    //
     public function __construct(User $model){

         parent::__construct($model);

	}
    public function index(){
         $comments=Comment::orderBy('id','desc')->paginate(20);
    	return view('back.home',compact('comments'));
    }
}
