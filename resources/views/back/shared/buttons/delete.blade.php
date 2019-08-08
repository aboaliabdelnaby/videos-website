   <form action="{{route($routName.'.destroy',['id'=>$row->id])}}" method="post">
  	 {{method_field('delete')}}
  	 {{csrf_field()}}
  	  <button type="submit" rel="tooltip" title="Remove {{$smodName}}" class="btn btn-white btn-link btn-sm">
    <i class="material-icons">close</i>
  </button>
  </form>