@extends('layouts.appp')

@section('title',$skill->name)
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>{{$skill->name}}</h2>
            </div>
              @include('front.shared.videoRow')

        </div>
    </div>
@endsection
