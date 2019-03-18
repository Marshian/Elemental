@section('content')
<div class="container">
<a class="btn btn-secondary" href="{{route('get.front.albums.view', array($photo->albums->first()->id))}}"><i class="icon-arrow-left"></i> {{ $photo->albums->first()->name }}</a>

<h1>{{{ $photo->name }}}</h1>

<img src="{{ GImage::url($photo->path) }}" class="img-responsive img-thumbnail" alt=""/>
<br/>
<br/>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <td>{{{ $photo->name }}}</td>
    </tr>
    <tr>
        <th>Url</th>
        <td>{{{ $photo->path }}}</td>
    </tr>
    <tr>
        <th>Alt</th>
        <td>{{{ $photo->alt }}}</td>
    </tr>
    @if($photo->tagged->count() > 0)
    <tr>
        <th>Tags</th>
        <td class="tag-cloud-sm" style="margin-top: 10px;">
            @foreach ($photo->tagged as $tags)
            <a class="tag-link label label-info" href="/photos/tagged/{{ $tags->name }}">{{ $tags->name }}</a>
            @endforeach
        </td>
    </tr>
    @endif
    </tbody>
</table>

@include('comments::widget', array('user' => $currentUser, 'commentable' => $photo, 'comments' => $photo->comments))
</div>
@stop
