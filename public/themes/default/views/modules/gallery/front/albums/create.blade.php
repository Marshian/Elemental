@section('content')
{{ Form::open(array('route' => 'post.albums.create')) }}
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Create Album</h4>
    </div>
    <div class="panel-body">

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('class'=> 'form-control')) }}
        </div>
    </div>
    <div class="panel-footer">
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        {{ link_to_route('get.albums', 'Cancel', null, array('class' => 'btn btn-default')) }}
    </div>
</div>
{{ Form::close() }}

@show
