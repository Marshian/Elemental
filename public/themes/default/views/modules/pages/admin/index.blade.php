@section('title')
    Pages -
    @parent
@stop

{{-- Content --}}
@section('content')
    @if ( ! empty($content))

        <div class="">
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    {!! $content !!}
                </ol>
            </div>
        </div>
    @else
        <h5>No pages added yet..</h5>
    @endif
@endsection
@section('footer_scripts')
    <script src="{{ asset('js/jquery.nestable.js') }}"></script>

    <script>
        $(function () {
            var updateOutput = function (e, n) {
                console.log(n)
                var list = e.length ? e : $(e.target), output = list.data('output');
                if (window.JSON) {
                    $.post('/admin/pages/sort', {
                            _token: '{{ Session::token() }}',
                            item: n.item.data('id'),
                            position: n.index,
                            prevParent: n.prevParent.length ? n.prevParent.data('id') : 0,
                            parent: n.parent.length ? n.parent.data('id') : 0
                            //,pages: window.JSON.stringify(list.nestable('serialize'))
                        },
                        function (data) {
                            console.log(data)
                        }, 'json'
                    );
                }
            };

            $('#nestable').nestable({
                maxDepth: 10
            }).on('change', updateOutput);

        });
    </script>
@endsection

@section('subnav')
    <a href="/admin/pages/create" class="btn btn-primary">New page</a>
@endsection