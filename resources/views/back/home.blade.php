@extends('back.layout.app')


@php $pageTitle="Home Page" @endphp

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

  @include('back.homeSections.statics')

  @include('back.homeSections.latestComments')



@endsection

@push('js')

@endpush
