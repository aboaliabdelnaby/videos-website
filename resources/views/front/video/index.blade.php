@extends('layouts.appp')

@section('des',$video->meta_des)
@section('keywords',$video->meta_keywords)
@section('title',$video->name)
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $url=getYoutubeId($video->youtube);
                    @endphp
                    @if($url)
                        <iframe width="100%"height="500px" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allowfullscreen style="margin-bottom: 20px"></iframe>
                    @endif
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                   <p>
                       <span style="margin-right: 20px">
                         <i class="nc-icon nc-user-run"></i> : {{$video->user->name}}
                       </span>
                       <span style="margin-right: 20px">
                        <i class="nc-icon nc-calendar-60"></i> : {{$video->created_at}}
                       </span>
                       <span style="margin-right: 20px">
                         <i class="nc-icon nc-single-copy-04"></i> :
                           <a href="{{route('front.category',['id'=>$video->cat->id])}}">{{$video->cat->name}}</a>
                       </span>





                    <p>{{$video->des}}</p>

                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{route('front.tags',['id'=>$tag->id])}}">
                            <span class="badge badge-primary">{{$tag->name}}</span>
                            </a>
                        @endforeach
                    </p>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{route('front.skill',['id'=>$skill->id])}}">
                            <span class="badge badge-info">{{$skill->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
            @include('front.video.comments')
            @include('front.video.createComment')




        </div>
    </div>
@endsection
