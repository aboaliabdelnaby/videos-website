<form action="{{route('comments.store')}}" method="post">
    {{csrf_field()}}
    @include('back.comments.form')
    <input type="hidden" name="video_id" value="{{$row->id}}">

    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
    <div class="clearfix"></div>
</form>
