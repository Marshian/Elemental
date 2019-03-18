	<div class="card card-default">
        <div class="card-header">
            <h4 id="add-comments">
                Add a comment {{ $user->first_name or 'Guest' }}
            </h4>
        </div>
        <div class="card-body">
            @if ($user)
            {{ Form::open(array('route'=>'post.comments.create')) }}

            {{-- This is used to return the user back to this page --}}
            {{ Form::hidden('return', Request::url()) }}

            {{-- This is used to ensure the comment is added to the right commentable object --}}
            {{ Form::hidden('commentable', Crypt::encrypt(get_class($commentable) . '.' . $commentable->getKey())) }}

            <div class="form-group{{ $errors->has('comment') ? ' form-group-error' : '' }}">
                {{ Form::textarea('body', Input::old('body'), array('placeholder' => 'Add comment here..', 'required' => 'required', 'class' => 'form-control')) }}
            </div>

            <div class="form--group form--group__submit">
                {{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
            </div>

            {{ Form::close() }}

            @else

            <p class="comments--login--required">
                You must be logged in to add a comment.

            </p>
            <a href="{{route('get.login')}}" class="btn btn-primary btn-xs">
                Login
            </a>
            <a href="{{ route('get.register') }}" class="btn btn-secondary btn-xs">
                Register
            </a>
            @endif
        </div>
	</div>