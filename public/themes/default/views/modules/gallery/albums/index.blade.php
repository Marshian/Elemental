@section('content')
<div class="container">

<div class="card card-default">
    <div class="card-header">
          <a href="{{ route('get.albums.create') }}" class="btn btn-primary pull-right" data-toggle="tooltip" title="Create Album"><i class="icon-plus"></i></a>
        <h4>All Albums</h4>
    </div>
    <div class="card-body">
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
                    <a href="{{route('get.albums.view', array($album->id))}}" title="View Photos">
                    @if ($album->path)
                        <img src="{{ GImage::url($album->path, 'thumb') }}" class="img-responsive img-thumbnail" alt=""/>
                    @else
                        <img src="http://placehold.it/231x180/eeeeee/555555&text=Cover+Image" class="img-responsive img-thumbnail" alt=""/>
                    @endif
                    </a>
                    @if($album->description)
                    <br/>
                    <br/>
                    <p class="text-muted">{{{ $album->description or '&nbsp;' }}}</p>
                    @else
                        <br/><br/><p>&nbsp;</p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <div class="btn-group">
                        <a href="{{route('get.albums.view', array($album->id))}}" class="btn btn-secondary btn-sm tip" title="View Photos"><i class="icon-picture"></i></a>
                        <a href="{{route('get.albums.photos.add', array($album->id))}}" class="btn btn-secondary btn-sm tip" title="Add Photos"><i class="icon-plus"></i></a>
                        <a href="{{route('get.albums.edit', array($album->id))}}" class="btn btn-secondary btn-sm tip" title="Edit Album"><i class="icon-pencil"></i></a>
                        <a href="{{route('get.albums.delete', array($album->id))}}" class="btn btn-secondary btn-sm confirm tip" title="Delete Album"><i class="icon-trash"></i></a></div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    @else
    There are no albums
    @endif
    </div>
    </div>


</div>
@show
