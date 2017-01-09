@section('title')
Pages -
@parent
@stop

{{-- Content --}}
@section('content')
<div class="container">

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('get.admin.pages.create') }}" title="Add pages" data-toggle="tooltip"><i class="icon-plus"></i></a>
		</div>
		<h4>Pages</h4>
	</div>
	<div class="panel-body">

	@if ( ! $pages->isEmpty())

		<div class="cf nestable-lists">
			<div class="dd" id="nestable">
				<ol class="dd-list">
					{{ $content }}
				</ol>
			</div>
		</div>
	@else
		<div class="panel">
			<h5>No pages added yet..</h5>
		</div>
	@endif
	
	</div>
<!-- 	<div class="panel-footer text-right">
	</div> -->
</div>
	<script src="{{ asset('js/jquery.nestable.js') }}"></script>

	<script>
	$(function(){
	   var updateOutput = function(e){
	        var list = e.length ? e : $(e.target), output = list.data('output');
	        if (window.JSON) {
	            $.post('/admin/pages/sort', {
	            		_token: '{{ Session::token() }}',
	            		pages: window.JSON.stringify(list.nestable('serialize'))
	            	},
	            	function(data){
	            		console.log(data)
	            	}, 'json'
	            );
	        }
	    };

		$('#nestable').nestable({
			maxDepth: 10
		}).on('change', updateOutput);

	});
	</script>

@show