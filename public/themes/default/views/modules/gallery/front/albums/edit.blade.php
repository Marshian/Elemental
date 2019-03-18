@section('content')
{{ Form::model($album, array('route' => array('post.albums.edit', $album->id))) }}
<div class="card card-primary">
<div class="card-header">
    <h4>Edit Album</h4>
</div>
<div class="card-body">

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class'=> 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class'=> 'form-control')) }}
    </div>
</div>
    <div class="card-footer">
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        {{ link_to_route('get.albums', 'Cancel',null, array('class' => 'btn btn-secondary')) }}
    </div>
</div>
{{ Form::close() }}

@show
