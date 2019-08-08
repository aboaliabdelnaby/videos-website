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

      <form action="{{route($routName.'.update',['id'=>$row->id])}}" method="post" enctype="multipart/form-data">
           {{method_field('put')}}
           @include('back.'.$folderName.'.form')
        <button type="submit" class="btn btn-primary pull-right">Update {{$modName}}</button>
        <div class="clearfix"></div>
      </form>

      @slot('md4')
          @php
             $url=getYoutubeId($row->youtube);
          @endphp
          @if($url)
         <iframe width="350" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allowfullscreen style="margin-bottom: 20px"></iframe>
         @endif
         <img src="{{url('uploads/'.$row->image)}}" width="350">
      @endslot
    @endcomponent



  @component('back.shared.edit',['pageTitle'=>'Comments','pageDes'=>'here we can control comments'])

      @include('back.comments.index')

      @slot('md4')
          @include('back.comments.create')
      @endslot
  @endcomponent



@endsection

@push('js')

@endpush
