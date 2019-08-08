
    <a href="{{route('front.video',['id'=>$video->id])}}" title="{{$video->name}}"><div class="card" style="width: 20rem;">
        <img class="card-img-top" src="{{url('uploads/'.$video->image)}}" alt="{{$video->name}}" style="max-height: 160px">
        <div class="card-body">
            <p class="card-text">
                {{$video->name}}
            </p>
            <small>{{$video->created_at}}</small>
        </div>
    </div>
    </a>

