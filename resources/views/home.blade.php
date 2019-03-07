@extends('layouts.app')

@section('content')
@include('partials.nav-default')
@include('partials.search')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! Redirecting to home page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_js')
<script>
    window.setTimeout(function(){
        window.location.href = '/';
    }, 3000);
</script>
@endsection
