<?php

namespace App\Http\Controllers\Back;

use App\Models\User;


use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Back\Users\Store;
use App\Http\Requests\Back\Users\Update;
class Users extends BackController
{
    //
    public function __construct(User $model){
         
         parent::__construct($model);  

	}
    
     protected function filter($rows){
    	if(request()->has('name') && request()->get('name')!=''){
           $rows=$rows->where('name',request()->get('name'));
    	}
    	return $rows;
    }
    
    public function store(Store $request){
        $array=$request->all();
        $array['password']=Hash::make($array['password']);
    	$this->model->create($array);
        return redirect()->route('users.index');
    	
    }
     
    public function update($id,Update $request){
    	$row=$this->model->findOrFail($id);
    	$array=$request->all();
        if(isset($array['password']) && $array['password']!=''){
        	$array['password']= Hash::make($request->password);
        }else{
        	unset($array['password']);
        }
        
    	$row->update($array);
        return redirect()->route('users.index');

    }
    
}
