@section('content')


<br/>
<br/>
<div class="card card-default">
    <div class="card-header">
        <h4>Photos tagged with <div class="label label-primary">{{ $tag }}</div></h4>
    </div>
    <div class="card-body">
    <div id="timeline" class="photo-grid" data-columns>
        @if (count($photos))
        @foreach ($photos as $photo)
        <div class="item" data-id="{{ $photo->id }}">
            <a href="{{ route('get.front.photo.view', [$photo->path]) }}">
                <img src="{{ GImage::url($photo->path, 'thumb') }}" class="img-responsive" alt=""/></a>
            @if($photo->tagged->count() > 0)
            <div class="tag-cloud-sm" style="margin-top: 10px;">
                @foreach ($photo->tagged as $tags)
                <a class="tag-link label label-info" href="/photos/tagged/{{ $tags->name }}">{{ $tags->name }}</a>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
        @else
        There are no albums
        @endif
    </div>
    </div>
    </div>
</div>

<script src="/assets/js/salvattore.min.js"></script>
@show
