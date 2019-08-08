@if(auth()->user())
    <form method="post" action="{{route('front.commentStore',['id'=>$video->id])}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Add Comment</label>
            <textarea name="comment"  class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn">Add Comment</button>
    </form>
@endif
