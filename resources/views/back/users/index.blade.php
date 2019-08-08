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
  @component('back.shared.table',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
          @slot('addButton')
    	<div class="col-md-4 text-right">
			<a href="{{route($routName.'.create')}}" class="btn btn-white btn-round">Add {{$smodName}}</a>
		</div>
        @endslot
         <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                            Group
                        </th>
                        <th class="text-right">
                          Control
                        </th>
                      </thead>
                      <tbody>
                         @foreach($rows as $row)
                         <tr>
                         	<td>{{$row->id}}</td>
                         	<td>{{$row->name}}</td>
                         	<td>{{$row->email}}</td>
                             <td>{{$row->group}}</td>
                         	 <td class="td-actions text-right">

	                           @include('back.shared.buttons.edit')
	                           @include('back.shared.buttons.delete')

                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                    </table>
                    {{$rows->links()}}
                  </div>

  @endcomponent


@endsection

@push('js')

@endpush
