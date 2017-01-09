
<script id="tmpl-question-container" type="x-handlebars-template">
	{{#questions }}
		{{> pquestions }}
	{{/questions}}
</script>

<script id="tmpl-question" type="x-handlebars-template">
	<li>
		<div class="question-set well">
			<div class="form-group">
				<label>Question</label>
				<input type="text" class="question form-control" placeholder="Question?" value="{{ question.text }}">
			</div>
			<div class="form-group">
				<label>Answers</label>
				{{#answers }}
					{{> panswers }}
				{{/answers}}
				<br>
				<a href="#" class="btn btn-primary btn-sm add-answer"><i class="icon-plus"></i> Answer</a>
			</div>
		</div>
	</li>
</script>

<script id="tmpl-answer" type="x-handlebars-template">
	<div class="answer-set">
		<div class="row">
			<div class="col-sm-10"><input type="text" class="answer-txt form-control" placeholder="Answer" value="{{this.text}}"></div>
			<div class="col-sm-2"><label class="checkbox"><input type="checkbox" class="is-correct"{{#if this.checked}} checked="checked"{{/if}}> Correct</label></div>
		</div>
	</div>
</script>