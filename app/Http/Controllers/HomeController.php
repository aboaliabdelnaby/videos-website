<?php

namespace App\Http\Controllers;


use App\Http\Requests\Front\Comments\Store;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate','commentStore','profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $videos=Video::Published()->orderBy('id','desc');
        if(request()->has('search')&& request()->get('search')!=''){

            $videos=$videos->where('name','like','%'.request()->get('search').'%');
        }
        $videos=$videos->paginate(30);
        return view('home',compact('videos'));
    }



    public function category($id)
    {
        $cat=Category::findOrFail($id);
        $videos=Video::Published()->where('cat_id',$id)->orderBy('id','desc')->paginate(30);
        return view('front.category.index',compact('videos','cat'));
    }

    public function video($id)
    {
        $video=Video::Published()->findOrFail($id);
        return view('front.video.index',compact('video'));
    }

    public function skills($id)
    {
        $skill=Skill::findOrFail($id);
        $videos=Video::Published()->whereHas('skills',function ($query) use($id){
            $query->where('skill_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('front.skill.index',compact('videos','skill'));
    }

    public function tags($id)
    {
        $tag=Tag::findOrFail($id);
        $videos=Video::Published()->whereHas('tags',function ($query) use($id){
            $query->where('tag_id',$id);
        })->orderBy('id','desc')->paginate(30);
        return view('front.tag.index',compact('videos','tag'));
    }

    public function commentUpdate($id,Store $request){

        $comment=Comment::findOrFail($id);
        if(($comment->user_id==auth()->user()->id)||auth()->user()->group=='admin'){

            $comment->update(['comment'=>$request->comment]);

        }
        return redirect()->route('front.video',['id'=>$comment->video_id,'#comments']);
    }

    public function commentStore($id,Store $request){

        $video=Video::Published()->findOrFail($id);
        Comment::create([
           'user_id' => auth()->user()->id,
           'video_id'=>$video->id,
            'comment'=>$request->comment

        ]);

        return redirect()->route('front.video',['id'=>$video->id,'#comments']);
    }

      public function messageStore(\App\Http\Requests\Front\Messages\Store $request){

        Message::create($request->all());
        return redirect()->route('front.landing');

      }

     public function welcome(){
        $videos=Video::Published()->orderBy('id','desc')->paginate(9);

        $videos_count=Video::Published()->count();
        $tags_count=Tag::count();
        $comments_count=Comment::count();
        return view('welcome',compact('videos','videos_count','tags_count','comments_count'));
     }
     public function page($id,$slug=null){

        $page=Page::findOrFail($id);
         return view('front.page.index',compact('page'));
     }
    public function profile($id,$slug=null){

        $user=User::findOrFail($id);
        return view('front.profile.index',compact('user'));
    }
    public function profileUpdate(\App\Http\Requests\Front\Users\Store $request){

        $user=User::findOrFail(auth()->user()->id);
        $array=[];
        if($request->email!=$user->email){
          $email=User::where('email',$request->email)->first();
          if($email==null){
              $array['email']=$request->email;
          }
        }
        if($request->name!=$user->name){
            $array['name']=$request->name;
        }
        if($request->password!=''){
            $array['password']=Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }
        return redirect()->route('front.profile',['id'=>$user->id,'slug'=>slug($user->name)]);
    }








}
