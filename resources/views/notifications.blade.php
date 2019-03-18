
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				@foreach ($errors->all() as $msg)
					<p>{{ $msg }}</p>
				@endforeach
			</div>
		@endif

		@if ($message = session('success'))
			<div class="alert alert-success">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				<b>Success</b>
				{{ $message }}
			</div>
		@endif

		@if ($message = session('error'))
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				<b>Error</b>
				{{ $message }}
			</div>
		@endif

		@if ($message = session('warning'))
			<div class="alert alert-warning">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				<b>Warning</b>
				{{ $message }}
			</div>
		@endif

		@if ($message = session('info'))
			<div class="alert-info">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				<b>Info</b>
				{{ $message }}
			</div>
		@endif
	</div>
</div>