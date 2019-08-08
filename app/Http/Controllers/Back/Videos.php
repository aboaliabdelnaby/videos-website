<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Http\Requests\Back\Videos\Store;
use App\Http\Requests\Back\Videos\Update;
class Videos extends BackController
    {
        use CommentTrait;

     public function __construct(Video $model){

         parent::__construct($model);

	}
    protected function with(){
        return ['cat','user'];
    }
    protected function append(){

        $array= [
            'categories'=>Category::get(),
            'skills'=>Skill::get(),
            'tags'=>Tag::get(),
            'selectedSkills'=>[],
            'selectedTags'=>[],
            'comments'=>[]
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']=$this->model->find(request()->route()->parameter('video'))->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']=$this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
            $array['comments']=$this->model->find(request()->route()->parameter('video'))->comments()->orderBy('id','desc')->get();

        }
        return $array;
    }



     protected function filter($rows){
    	if(request()->has('name') && request()->get('name')!=''){
           $rows=$rows->where('name',request()->get('name'));
    	}
    	return $rows;
    }

    public function store(Store $request){

        $fileName=$this->uploadImage($request);

        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->all();

    	$row=$this->model->create($requestArray);
        $this->syncTagsSkills($row,$requestArray);

        return redirect()->route('videos.index');

    }

    public function update($id,Update $request){
        $requestArray=$request->all();
        if($request->hasFile('image')){

            $fileName=$this->uploadImage($request);
            $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName] +$requestArray;
        }

    	$row=$this->model->findOrFail($id);
    	$row->update($requestArray);
        $this->syncTagsSkills($row,$requestArray);
        return redirect()->route('videos.index');

    }

    protected function uploadImage($request){
        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        return $fileName;
    }

    protected function syncTagsSkills($row,$requestArray){
        if(isset($requestArray['skills'])&& !empty($requestArray['skills'])){
           $row->skills()->sync($requestArray['skills']);
        }
        if(isset($requestArray['tags'])&& !empty($requestArray['tags'])){
           $row->tags()->sync($requestArray['tags']);
        }
    }
}
