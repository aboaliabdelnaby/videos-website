@extends('layouts.appp')

@section('des',$page->meta_des)
@section('keywords',$page->meta_keywords)
@section('title',$page->name)
@section('content')
    <div class="section section-buttons text-center" style="min-height: 600px">
        <div class="container">
            <div class="title">
                <h1>{{$page->name}}</h1>
            </div>
          <p>
              {!! $page->des !!}
          </p>

        </div>
    </div>
@endsection
