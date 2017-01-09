@section('content')
	<div class="container">
	{{ Form::open() }}
		{{ Form::hidden('parent_id', 0) }}
		{{ FormField::title('slug') }}
		{{ FormField::slug('slug') }}

		{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
	{{ Form::close() }}
	</div>
@show