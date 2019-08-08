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


           @include('back.'.$folderName.'.form')

    @endcomponent


@endsection

@push('js')

@endpush
