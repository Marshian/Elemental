@section('content')
<link rel="stylesheet" href="/css/app.css"/>
<div class="container">
<div class="card card-default">
	<div class="card-header">
		<a href="{{ route('get.albums.view', [$album->id]) }}" class="btn btn-primary pull-right" data-toggle="tooltip"><i class="icon-arrow-left"></i> Album</a>
		<h4>{{ $album->name  }} <small>Upload Images</small></h4>
	</div>
    <div class="card-body upload-container">

                <div class="example">
                    <div class="example__left" style="text-align: left; padding-top: 100px;">
                        <div id="multiupload">
                            <form class="b-upload b-upload_multi" action="{{ route('post.albums.photos.add', array($album->id)) }}" method="POST" enctype="multipart/form-data">
                                <div class="b-upload__hint">Add files to the download queue, such as images</div>

                                <div class="js-files b-upload__files">
                                    <div class="js-file-tpl b-thumb" data-id="<%=uid%>" title="<%-name%>, <%-sizeText%>">
                                        <div data-fileapi="file.remove" class="b-thumb__del">✖</div>
                                        <div class="b-thumb__preview">
                                            <div class="b-thumb__preview__pic"></div>
                                        </div>
                                        <% if( /^image/.test(type) ){ %>
                                            <div data-fileapi="file.rotate.cw" class="b-thumb__rotate"></div>
                                        <% } %>

                                        <div class="b-thumb__progress progress progress-small"><div class="progress-bar bar"></div></div>
                                        <div class="b-thumb__name"><%-name%></div>
                                    </div>
                                </div>

                                <hr/>
                                <div class="btn btn-success btn-sm js-fileapi-wrapper">
                                    <span>Add</span>
                                    <input type="file" name="url" />
                                </div>
                                <div class="js-upload btn btn-success btn-sm">
                                    <span>Upload</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</div>
</div>

<script>
    var FileAPI = {
        debug: false
        , media: true
        , staticPath: '/assets/js/FileAPI/'
    };
</script>
<script src="/js/FileAPI/FileAPI.js"></script>
<script src="/js/FileAPI/FileAPI.exif.js"></script>
<script src="/js/jquery.fileapi.js"></script>
<script>
    var $uploadEl = $('#multiupload');
    $uploadEl.fileapi({
        multiple: true,
        onFileComplete: function (evt, ui){
            evt.preventDefault();
            evt.widget.remove(ui.file);
        },
        elements: {
            ctrl: { upload: '.js-upload' },
            empty: { show: '.b-upload__hint' },
            emptyQueue: { hide: '.js-upload' },
            list: '.js-files',
            file: {
                tpl: '.js-file-tpl',
                preview: {
                    el: '.b-thumb__preview',
                    width: 250,
                    height: 250
                },
                upload: { show: '.progress', hide: '.b-thumb__rotate' },
                complete: { hide: '.progress' },
                progress: '.progress .bar'
            }
        }
    });
</script>
@stop
