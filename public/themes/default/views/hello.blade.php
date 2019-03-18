
@section('title')
	@parent
	- Teachers
@stop

@section('content')
	<div class="container">


	<div class="card card-default">
	  <!-- Default card contents -->
	  <div class="card-header"><h4>{{ $title or '' }} <small class='pull-right'>Total: {{ $teachers->getTotal() }}</small></h4></div>
	    <table class="table">
	         <thead>
	         <tr>
	            <th>PID</th>
	            <th>Login</th>
	            <th>Passwd</th>
	            <th>Sch Code</th>
	            <th>First Name</th>
	            <th>Last Name</th>
	         </tr>         	
	         </thead>
	         <tbody>
	         @foreach ($teachers as $teacher)
	            <tr>
	               <td>{{ $teacher->pid0 }}</td>
	               <td>{{ $teacher->uname }}</td>
	               <td><span class="hidden pass">{{ $teacher->passwd }}</span><a href="#" class="toggle-pass">Show</a></td>
	               <td>{{ $teacher->uname2 }}</td>
	               <td>{{ $teacher->fname }}</td>
	               <td>{{ $teacher->lname }}</td>
	            </tr>
	         @endforeach
	     	</tbody>
	     </table>
	     <div class="card-footer">
	     {{ $teachers->links() }}
	     </div>
	</div>
	</div>

	<script>
	  $(function(){
	    $('.toggle-pass').on('click', function(){
	      $(this).fadeOut(function(){
	        $(this).prev('.pass').removeClass('hidden').fadeIn();
	      })
	    })
	    $('.pass').on('click', function(){
	      $(this).fadeOut(function(){
	        $(this).addClass('hidden').next('.toggle-pass').fadeIn();
	      })
	    })
	  });
	</script>

@show
