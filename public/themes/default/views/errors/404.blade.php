@extends('...layouts.default')

@section('title')
    {{ $statusCode }} Error
@stop

@section('content')
    <div class="container">
        <h3>{{ $statusCode }} Error</h3> 
    </div>
@stop