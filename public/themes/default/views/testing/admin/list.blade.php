@section('content')
	<div class="container">

	<h2>{{ $title }}</h2>
	<hr>

	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Series</th>
				<th>Questions</th>
				<th>Actions</th>
				<tbody>
				
				@foreach($assessments as $test)
					<tr>
						<td>{{ $test->title }}</td>
						<td>{{ $test->series->title }}</td>
						<td>{{ count(json_decode($test->test_data)) }}</td>
						<td>
							<a href="/admin/testing/edit/{{ $test->id }}" class="btn btn-primary btn-xs">Edit</a>
							<a href="/admin/testing/edit/{{ $test->id }}" class="btn btn-danger confirm btn-xs">Remove</a>
						</td>
					</tr>
				@endforeach

				</tbody>
			</tr>
		</thead>
	</table>

@show