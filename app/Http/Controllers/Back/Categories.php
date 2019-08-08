<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Back\Categories\Store;
class Categories extends BackController
{
    //
     public function __construct(Category $model){
         
         parent::__construct($model);  

	}
    
     protected function filter($rows){
    	if(request()->has('name') && request()->get('name')!=''){
           $rows=$rows->where('name',request()->get('name'));
    	}
    	return $rows;
    }
    
    public function store(Store $request){
    	$this->model->create($request->all());
        return redirect()->route('categories.index');
    	
    }
     
    public function update($id,Store $request){
    	$row=$this->model->findOrFail($id);
    	$row->update($request->all());
        return redirect()->route('categories.index');

    }
}
