@section('content')

<h1>All Photos</h1>

<p>{{ link_to_action('App\Gallery\Controllers\PhotosController@create', 'Add new photo', null, array('class'=> 'btn
    btn-primary')) }}</p>

@if ($photos->count())
    @foreach (array_chunk($photos->all(), 6) as $bundle)
    <div class="row">
        @foreach ($bundle as $photo)
        <div class="col-lg-2">
            <h4>{{{ $photo->name }}}</h4>
            @if(isset($photo->alt))
            <p class="text-muted">{{{ $photo->alt }}}</p>
            @endif
            <hr/>
            <img src="{{asset(Config::get('gallery.upload_folder').$photo->url)}}" class="img-rounded img-responsive img-uploaded" alt="{{$photo->alt}}"/>
            @if($photo->favorite)
            <a href="{{ action('App\Gallery\Controllers\PhotosController@favorite', array($photo->id)) }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-star"></i></a>
            @else
            <a href="{{ action('App\Gallery\Controllers\PhotosController@favorite', array($photo->id))}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-star-empty"></i></a>
            @endif

            {{ link_to_action('App\Gallery\Controllers\PhotosController@edit', 'Edit', array($photo->id), array('class' =>
            'btn btn-info btn-xs')) }}
            {{ Form::open(array('method' => 'DELETE', 'action' => array('App\Gallery\Controllers\PhotosController@destroy',
            $photo->id))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
            {{ Form::close() }}

        </div>
        @endforeach
    </div>
    @endforeach

    @if(Config::get('gallery.pagination_items'))
        {{ $photos->links() }}
    @endif
@else
There are no photos
@endif

@show
