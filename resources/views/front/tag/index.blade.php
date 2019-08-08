@extends('layouts.appp')

@section('title',$tag->name)
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>{{$tag->name}}</h2>
            </div>
              @include('front.shared.videoRow')

        </div>
    </div>
@endsection
