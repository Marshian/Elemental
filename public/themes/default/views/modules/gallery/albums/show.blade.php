@section('content')
<link rel="stylesheet" href="/css/app.css"/>
<div class="container">
<div class="card card-default">
<div class="card-header">
<div class="pull-right">
<a href="{{route('get.albums.photos.add', array($album->id))}}" class="btn btn-primary" data-toggle="tooltip" title="Add Photos"><i class="icon-plus"></i></a>
 <a href="{{ route('get.albums') }}" class="btn btn-primary" data-toggle="tooltip" title="Back to Albums"><i class="icon-arrow-left"></i></a>
 </div>
<h4>{{ $album->name }} <small>Album</small></h4>
</div>
    <div class="card-body">
    <div id="timeline" class="photo-grid" data-columns>
            @if (count($album))
            @foreach ($album->photos as $photo)
            <div class="item" data-id="{{ $photo->id }}">
                <img src="{{ GImage::url($photo->path, 'thumb') }}" class="img-responsive" alt=""/>
                <div class="btn-overlay">
                    <a class="btn btn-xs btn-secondary btnSetCover" data-id="{{ $photo->id }}" href="#">Set as cover</a>
                    <a class="btn btn-xs btn-secondary" href="{{ route('get.photo.edit', $photo->id) }}">Edit</a>
                    <a class="btn btn-xs btn-danger confirm" href="{{ route('get.photo.delete', [$photo->id]) }}">Delete</a>
                </div>
            </div>
            @endforeach
            @else
            There are no albums
            @endif
    </div>
    </div>
</div>
</div>
<script src="/js/salvattore.min.js"></script>
<script>
    $(function(){
        var $optForm = $('#opt-form'),
            $btnSetCover = $('.btnSetCover');

        $btnSetCover.on('click', function(e){
            e.preventDefault();
            var $this = $(this),
                id = $this.data('id');


            $.post("{{ route('post.albums.setcover') }}", {photo_id: id, album_id: {{ $album->id }} }, function(d){
                $btnSetCover.removeClass('album-cover').data('cover', 'no');
                $this.addClass('album-cover').data('cover', 'yes');
                toastr.success("Set photo id "+id+" as album cover.");
            });
        });
        $('#timeline').on('click', '.item', function(){});

        $('#timeline').on('click', '.item', function(){
            $optForm.find('#opt-album-id').val($(this).data('id'));
            $optForm.modal('show');
        }).on('mouseenter click', '.item', function(){
            $('.btn-overlay').filter(this).hide();
            $(this).find('.btn-overlay').stop(true, true).fadeIn();
        }).on('mouseleave', '.item', function(){
            $(this).find('.btn-overlay').stop(true, true).fadeOut();
        });
    });
</script>
@show
