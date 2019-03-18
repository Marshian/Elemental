@section('content')
<div class="container">
<div class="card card-default">
    <div class="card-header">
        <h4>Edit Photo</h4>
    </div>
    <div class="card-body">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#album-image" role="tab" data-toggle="tab">Photo</a></li>
    <li><a href="#metadata" role="tab" data-toggle="tab">Content</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <br/>
    <div class="tab-pane active" id="album-image">
        <img src="{{  GImage::url($photo->path, 'thumb') }}" class="img-rounded img-responsive" alt=""/>
    </div>
    <div class="tab-pane" id="metadata">
        {{ Form::model($photo, array('route' => array('post.photo.edit', $photo->id), 'files'=>true)) }}

            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('class'=> 'form-control')) }}
            </div>
        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags[]', $available_tags, $current_tags, ['id'=>'tags','placeholder'=>'Add tags..','multiple'=>'multiple']) }}
        </div>
            <div class="form-group">
                {{ Form::label('path', 'Url:') }}
                {{ Form::file('path') }}
            </div>

            <div class="form-group">
                {{ Form::label('alt', 'Alt:') }}
                {{ Form::text('alt', null, array('class'=> 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('details', 'Details') }}<br/>
                {{ Form::textarea('details', null, array('class'=> 'form-control ckeditor')) }}
            </div>
            <div class="form-group">
                <br/>
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

            </div>
        {{ Form::close() }}
    </div>
</div>

    </div>
</div>
</div>

<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function(){
        $('#tags').selectize({
            plugins: ['remove_button', 'restore_on_backspace'],
//            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
    });
</script>
@stop
