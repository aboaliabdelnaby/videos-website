@extends('layouts.appp')

@section('des',$cat->meta_des)
@section('keywords',$cat->meta_keywords)

@section('title',$cat->name)
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$cat->name}}</h1>
            </div>
            @include('front.shared.videoRow')

        </div>
    </div>
@endsection
