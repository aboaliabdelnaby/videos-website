<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BackController extends Controller{

	protected $model;

	public function __construct(Model $model){

         $this->model=$model;

	}

	public function index(){

		$rows=$this->model;
		$rows=$this->filter($rows);
        $with=$this->with();
        if(!empty($with)){
           $rows=$rows->with($with);
        }
    	$rows=$rows->paginate(5);

    	$modName=$this->pluralModelName();
    	$smodName=$this->getModelName();
    	$routName=$this->getName();
		$pageTitle="Control ".$modName ;
		$pageDes="Here you can add / edit / delete ".$modName;
    	return view('back.'.$this->getName().'.index',compact('rows','modName','pageTitle','pageDes','smodName','routName'));
    }


    public function create(){

    	$modName=$this->getModelName();
		$pageTitle="Control ".$modName ;
		$pageDes="Here you can add / edit / delete ".$modName;
        $folderName=$this->getName();
        $routName=$folderName;
        $append=$this->append();
    	return view('back.'.$folderName.'.create',compact('modName','pageTitle','pageDes','folderName','routName'))->with($append);

    }


    public function destroy($id){

    	$this->model->findOrFail($id)->delete();
    	return redirect()->route($this->getName().'.index');
    }



    public function edit($id){
      	$modName=$this->getModelName();
		$pageTitle="Control ".$modName ;
		$pageDes="Here you can add / edit / delete ".$modName;
    	$folderName=$this->getName();
        $routName=$folderName;
    	$row=$this->model->findOrFail($id);
        $append=$this->append();
    	return view('back.'.$folderName.'.edit',compact('row','modName','pageTitle','pageDes','folderName','routName'))->with($append);
    }
    protected function with(){
        return [];
    }

    protected function append(){
        return [];
    }
    protected function getName(){
    	return strtolower($this->pluralModelName());
    }


    protected function filter($rows){

    	return $rows;
    }
    protected function pluralModelName(){
    	 return str_plural($this->getModelName());
    }
    protected function getModelName(){
    	return class_basename($this->model);
    }

}
