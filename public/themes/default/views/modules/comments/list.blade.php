@if (!$comments->isEmpty())
	{{-- Lazy eager load the user data for each comment, this is for --}}
	{{-- performance reasons to mitigate against the n+1 query problem --}}
	<?php $comments->load('user'); ?>
	<div class="row">
	<div class="timeline-centered">
		<?php
		$alignClass = ' left-aligned';
		$backgrounds = ['bg-primary','bg-success','bg-info','bg-warning','bg-danger'];
		foreach ($comments as $comment):
		$colorClass = $backgrounds[array_rand($backgrounds)];
		?>
<article class="timeline-entry{{ $alignClass }}" id="C{{ $comment->id }}">

		<div class="timeline-entry-inner">
		    <div class="timeline-meta">
                <time class="timeline-time" datetime="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</time>
                by <a class="comment--author"> {{{ $comment->user->first_name }}} </a>
            </div>
			<div class="timeline-icon {{$colorClass}}">
				<i class="icon-user"></i>
			</div>

			<div class="timeline-label">
				<p>{{ nl2br(htmlspecialchars($comment->body, null, 'UTF-8')) }}</p>
			</div>
		</div>

	</article>
		<?php
		$alignClass = ($alignClass == ' left-aligned') ? '' : ' left-aligned';
		endforeach;
		?>
	</div>
	</div>
@else
	<p class="no-comments">
		No comments yet.
	</p>
@endif