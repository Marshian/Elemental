@section('content')
    @foreach($posts as $post)
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">{{ $post->title }}</a></h4>
            </div>
            <div class="panel-body">
                <p>{!! $post->content_html !!}</p>
            </div>
            <div class="panel-footer font-sub">
                <small><i class="fa fa-calendar"></i> {{ $post->created_at->toFormattedDateString() }}</small>
                <span class="pull-right"><i class="fa fa-comment"></i> &nbsp;Comment</span>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-6">
            {!! $posts->render() !!}
        </div>
        <div class="col-md-6 text-right">
        </div>
    </div>
@endsection
