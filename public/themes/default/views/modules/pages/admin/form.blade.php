@section('content')

    @if(is_null($page->id))
        {!! Form::open(['route' => ['post.admin.pages.create']]) !!}
        {!! Form::hidden('parent_id', old("parent_id", $parent_id)) !!}
    @else
        {!! Form::open(['route' => ['post.admin.pages.edit', $page->id]]) !!}
        {!! Form::hidden('parent_id', old("parent_id", $page->parent_id)) !!}
    @endif
    <ul class="nav nav-tabs">
        <li class="nav-item"><a href="#card-general" class="nav-link active" data-toggle="tab">General</a></li>
        <li class="nav-item"><a href="#card-metadata" class="nav-link" data-toggle="tab">Metadata</a></li>
        <li class="nav-item"><a href="#card-css" class="nav-link" data-toggle="tab">CSS</a></li>
        <li class="nav-item"><a href="#card-js" class="nav-link" data-toggle="tab">JS</a></li>


    </ul>
    <br>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="card-general">
            <div class="row anim">
                <div class="col">
                    <div class="form-group">
                        {!! Form::textarea('content', old('content', $page->content), ['id' => 'htmleditor', 'class' => 'form-control ckeditor', 'style' => 'height: 500px;']) !!}
                    </div>
                </div>
                <div class="col-md-4 sidebar-offcanvas" id="title-column">
                    <div class="form-group">
                        <label for="title">Title</label>
                        {!! Form::text('title', old("title", $page->title), ['id' => 'title', 'class'=>'form-control']) !!}
                    </div>

                    <div>
                        {{ ! empty($parent_page) ? url($parent_page->uri) : url('/') }}/<span id="slug_uri"></span>
                        <button id="btn-slug" class="btn btn-xs btn-outline-secondary" type="button">Change</button>
                    </div>
                    <hr>
                    <div id="slug-group" style="display: none;">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="uri" type="hidden" id="uri" value="">
                            {!! Form::text('slug', old("slug", $page->slug), ['id'=>'slug', 'tabindex' => '-1', 'class'=>'form-control']) !!}
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        {!! Form::label('published', 'Status') !!}
                        {!! Form::select('published', [0 => 'Draft', 1 => 'Live'], old("published", $page->published), ['class' => 'select',
                        'style' => 'display:block']) !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('layout', 'Layout') !!}
                        {!! Form::select('layout', $layouts, old("layout", $page->layout), ['class' => 'select', 'style' => 'display:block']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="card-metadata">
            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::select('tags[]', $available_tags, old("tags", $current_tags), ['id'=>'tags','placeholder'=>'Adtags..','multiple'=>'multiple', 'class' => 'input-tags']) !!}
            </div>

            <div class="form-group">
                <label for="meta_title">Title</label>
                {!! Form::text('meta_title', old("meta_title", $page->meta_title), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_description', 'Description') !!}
                {!! Form::textarea('meta_description', old("meta_description", $page->meta_description), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_robots', 'Robots') !!}
                {!! Form::select('meta_robots', [
                    'all'=>'No Restrictions',
                    'index'=>'Index', 'noindex'=>'Noindex',
                    'nofollow'=>'Nofollow',
                    'both'=>'Noindex'
                ], old("meta_robots", $page->meta_robots), ['id'=>'tags', 'class' => 'select', 'placeholder'=>'Robot options..']) !!}
            </div>
        </div>

        <div class="tab-pane" id="card-css">
            <br/>
            {!! Form::textarea('css', old("css", $page->css), array('id' => 'css-editor', 'class' => 'form-control css_editor')) !!}
            <br>
        </div>
        <div class="tab-pane" id="card-js">
            <br/>
            {!! Form::textarea('js', old("js", $page->js), array('id' => 'js-editor', 'class' => 'js_editor form-control')) !!}
            <br>
        </div>
    </div>

    <div class="">
        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
        <a href="{{ route('get.admin.pages.index') }}" class="btn btn-secondary">Back to pages</a>
        <label class="inline-checkbox" title="Save and exit" data-toggle="tooltip">
            &nbsp {!! Form::checkbox('save_exit', 1, null) !!} Save and exit
        </label>
        <label class="inline-checkbox" title="Set as index page" data-toggle="tooltip">
            &nbsp {!! Form::checkbox('is_index', 1, old('is_index', $page->is_index)) !!} Index page
        </label>
    </div>
    {!! Form::close() !!}
@endsection

@section('styles')
    <style>
        .tab-pane {
            padding: 25px 0;
        }

        .css_editr, .js_editor {
            position: relative;
            height: 300px;
            font-family: Monaco, Menlo, 'Ubuntu Mono', Consolas, source-code-pro, monospace;
        }
        .anim {
            position: relative;
            -webkit-transition: all .25s ease-out;
            -o-transition: all .25s ease-out;
            transition: all .25s ease-out;
        }

        .sidebar-offcanvas.active {
            position: absolute;
            right: -100%;
        }
    </style>
@endsection

@section('footer_scripts')

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ace/ace.js') }}"></script>
    <script src="{{ asset('js/ace/mode-javascript.js') }}"></script>
    <script src="{{ asset('js/ace/mode-css.js') }}"></script>
    <script src="{{ asset('js/ace/theme-tomorrow_night.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            var uri = '{{ ! empty($parent_page) ? $parent_page->uri : '' }}/'
            $('.submit').on('click', function (e) {
                e.preventDefault()
                $('#submit').trigger('click');
            })
            $('.js_editor').ace({height: 300, width: '100%', theme: 'tomorrow_night', lang: 'javascript'});
            $('.css_editor').ace({height: 300, width: '100%', theme: 'tomorrow_night', lang: 'css'});

            $('#slug').on('change', function (e) {
                $('#slug_uri').text(this.value);
                $('#uri').val(uri+this.value);
            }).trigger('change');

            $('#title').slugify();

            var $titleColumn = $('#title-column');
            $('.column-toggle').on('click', function (e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $titleColumn.toggleClass('active');
            })

            $('#btn-slug').on('click', function (e) {
                e.preventDefault();
                $('#slug-group').slideToggle();
            })
        });
    </script>
@endsection

@section('subnav')
    <button type="button" class="btn btn-outline-primary column-toggle active" data-toggle="tooltip" title="Expanded editor">
        <i class="fa fa-columns" aria-hidden="true"></i>
    </button>
@endsection



