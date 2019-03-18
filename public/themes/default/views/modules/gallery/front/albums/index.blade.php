@section('content')
<div class="container">
<div class="card card-default">
    <div class="card-header">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h5>Tags <i class="icon-chevron-down pull-right"></i></h5></a>
    </div>
<div id="collapseOne" class="card-body card-collapse collapse">
@foreach ($tagCloud as $tag)
<a class="tag-link label label-info" href="/photos/tagged/{{ $tag['name'] }}" style="font-size:{{ $tag['size'] }}px;">{{ $tag['name'] }} ({{ $tag['count'] }})</a>
@endforeach
</div>
</div>
@if ($albums->count())
@foreach (array_chunk($albums->all(), 4) as $bundle)
<div class="row">
    @foreach ($bundle as $album)

    <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-header">
                {{{ $album->name }}} <span class="badge pull-right">{{$album->photo_count}}</span>
            </div>
            <div class="card-body">
                <a href="{{route('get.front.albums.view', array($album->id))}}" title="View Photos">
                @if ($album->path)
                    <img src="{{ GImage::url($album->path, 'thumb') }}" class="img-responsive img-thumbnail" alt=""/>
                @else
                    <img src="http://placehold.it/231x180/eeeeee/555555&text=Cover+Image" class="img-responsive img-thumbnail" alt=""/>
                @endif
                </a>
                @if($album->description)
                <br/>
                <br/>
                <p class="text-muted">{{{ $album->description }}}</p>
                @endif
            </div>
<!--            <div class="card-footer text-center">-->
<!--                <div class="btn-group">-->
<!--                    <a href="#" class="btn btn-secondary btn-sm tip" title="Facebook"><i class="icon-facebook"></i></a>-->
<!--                    <a href="#" class="btn btn-secondary btn-sm tip" title="Twitter"><i class="icon-twitter"></i></a>-->
<!--                    <a href="#" class="btn btn-secondary btn-sm tip" title="Instagram"><i class="icon-instagram"></i></a>-->
<!--                    <a href="#" class="btn btn-secondary btn-sm tip" title="Pinterest"><i class="icon-pinterest"></i></a></div>-->
<!---->
<!--            </div>-->
        </div>
    </div>
    @endforeach
</div>
@endforeach
@else
    There are no albums
@endif
</div>
@show
