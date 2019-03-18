@section('content')
	<div class="container">

	<h2>{{ $title }}</h2>
	<hr>
	{{ Form::open(array('id'=>'anwser-form')) }}
		{{ FormField::title(array('value'=>Request::old('title', $assessment->title))) }}
		{{ FormField::slug(array('value'=>Request::old('title', $assessment->slug))) }}
		{{ FormField::audio_files() }}
		<div class="form-group">
			{{ Form::label('series_id', 'Series') }}
			{{ Form::select('series_id', $seriesList, Request::old('title', $assessment->series_id), array('class'=>'form-control')) }}
		</div>
<style>
	.questions-container {
		list-style-position: inside;
		padding:0;
	}
	.questions-container li {
		font-size: 3em;
	}
	.question-set{
		font-size: .33em;
	}
	.answer-set{ margin-bottom: 15px;}
</style>
{{ Form::hidden('test_data', Request::old('test_data', $assessment->test_data), array('id' => 'test-data')) }}
<br>
<div class="card card-default">
  <div class="card-header">
  	<div class="btn-group pull-right">
  	<a href="#" class="btn btn-primary save-questions"><i class="icon-save"></i>  Save</a>
  	<a href="#" class="btn btn-secondary add-question"><i class="icon-plus"></i>  Question</a>
  	</div>
  	<h4>Questions</h4>
  </div>
  <br>
  
  <ol class="questions-container">
@if($assessment->title=='')

	<li>
	<div class="question-set well">
		<div class="form-group">
			<label>Question</label>
			<input type="text" class="question form-control" placeholder="Question?">
		</div>
		<div class="form-group">
			<label>Answers</label>
			<br><a href="#" class="btn btn-primary btn-sm add-answer"><i class="icon-plus"></i> Answer</a>
		</div>
	</div>
	</li>
@endif
</ol>

</div>
</form>
<br>
<br>
<br>
<br>
<br>
</div>

@include('testing.admin.js_templates')

<script>
$(document).ready(function() {
	
	Handlebars.registerPartial("pquestions", $("#tmpl-question").html());
	Handlebars.registerPartial("panswers", $("#tmpl-answer").html());
	
	var $container = $('.questions-container'),
		_tmpl = Handlebars.compile($("#tmpl-question-container").html());	

	var $test_data = $('#test-data');
	if ($test_data.val() != '')
	{
		var _qa = $.parseJSON($test_data.val()),
			_row;

		if (_qa.length > 0)
		{
			$container.html(_tmpl({questions:_qa}));
		}
	}

	$('.add-question').on('click', function(e) {
		e.preventDefault();
		$container.append($(this).tmpl('question', [], true));

	})
	$container.on('click', '.add-answer', function(e) {
		e.preventDefault();
        $(this).before($(this).tmpl('answer', [], true));
   })
	.on('click', '.is-correct', function(e) {

		var $this = $(this),
			$fgroup = $this.closest('.form-group');

		$fgroup.find('.is-correct').prop('checked', false);

		if ( ! $this.is(':checked'))
		{
			$this.prop('checked', true);
		}
	});

	$('.save-questions').click(function(e){
		e.preventDefault();
		var data = JSON.stringify(serializeQuestions());
		$('#test-data').val(data);
		$(this).closest('form').submit();
	});
	
	var serializeQuestions = function(){
		var testData=[];

		//Questions
		$('.questions-container li').each(function(i, v){
			var $this = $(this), row;
			
			row = {
                question: {
                    text: $this.find('.question').val()
                },
                answers: []
            };

			//Answers
			$this.find('.answer-set').each(function(ii, vv){
				var $_this = $(this),
                    answer = {
                        key: ii,
                        checked: false,
                        text: $_this.find('.answer-txt').val()
				    };

				if ($_this.find('.is-correct').prop('checked'))
				{
					row['answer'] = ii;
                    answer.checked = true;

				}
				row.answers.push(answer);
			});
			testData.push(row);
		});

		return testData;
	}
});
</script>
@show