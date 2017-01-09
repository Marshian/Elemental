<div class="col-md-6 col-md-offset-2">
@if (count($errors) > 0)
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
		@foreach ($errors->all() as $msg)
			<p>{{ $msg }}</p>
		@endforeach
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<b>Success</b>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<b>Error</b>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<b>Warning</b>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert-info">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<b>Info</b>
	{{ $message }}
</div>
@endif
</div>