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
       @component('back.shared.edit',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
          
      <form action="{{route($routName.'.update',['id'=>$row->id])}}" method="post">
           {{method_field('put')}}
           @include('back.'.$folderName.'.form')
        <button type="submit" class="btn btn-primary pull-right">Update {{$modName}}</button>
        <div class="clearfix"></div>
      </form>
    @endcomponent

 
@endsection

@push('js')

@endpush