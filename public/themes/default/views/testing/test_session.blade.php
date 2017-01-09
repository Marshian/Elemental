@section('content')

<!--
	* Load test session
	* Get starting question (or current question if continuing)
	* Display question
	* Display answers
	* Awnser question
	* send answer to server
	* send next question
-->
<div class="container">
    <div id="stage"></div>
</div>

<script src="{{ asset('/js/assessment_engine.js') }}"></script>

<script>
    $(function(){
        $.myRunner = new TestRunner(123, {questions: {{ $assessment['test_data'] }} }).start();
    })
</script>
@show