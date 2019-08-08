@extends('back.layout.app')



@section('title')
{{$pageTitle}}

@endsection

@push('css')

@endpush

@section('content')

  @component('back.layout.header')
   
  @slot('nav_title')
    
    {{$pageTitle}}
  @endslot

  @endcomponent
   @component('back.shared.create',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
     <form action="{{route($routName.'.store')}}" method="post">
                   
           @include('back.'.$folderName.'.form')
        <button type="submit" class="btn btn-primary pull-right">Add {{$modName}}</button>
        <div class="clearfix"></div>
      </form>
  @endcomponent

@endsection

@push('js')

@endpush