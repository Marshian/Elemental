{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('session_id', 'Session_id:') }}
			{{ Form::text('session_id') }}
		</li>
		<li>
			{{ Form::label('series_id', 'Series_id:') }}
			{{ Form::text('series_id') }}
		</li>
		<li>
			{{ Form::label('assessment_id', 'Assessment_id:') }}
			{{ Form::text('assessment_id') }}
		</li>
		<li>
			{{ Form::label('user_id', 'User_id:') }}
			{{ Form::text('user_id') }}
		</li>
		<li>
			{{ Form::label('cur_question', 'Cur_question:') }}
			{{ Form::text('cur_question') }}
		</li>
		<li>
			{{ Form::label('answers', 'Answers:') }}
			{{ Form::textarea('answers') }}
		</li>
		<li>
			{{ Form::label('q_wrong', 'Q_wrong:') }}
			{{ Form::text('q_wrong') }}
		</li>
		<li>
			{{ Form::label('q_correct', 'Q_correct:') }}
			{{ Form::text('q_correct') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}