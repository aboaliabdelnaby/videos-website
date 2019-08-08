<div class="row text-left">
    @foreach($videos as $video)
        <div class="col-lg-4">
            @include('front.shared.videoCard')

        </div>
    @endforeach


</div>
<div class="row">
    <div class="col-md-12">
        {{$videos->links()}}

    </div>
</div>
