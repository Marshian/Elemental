@if (isset($title) || isset($breadcrumbs))
    <div class="subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if (isset($title))
                        <h2>{{ $title or '' }}</h2>
                    @endif
                </div>
                <div class="col-md-6 text-right">
                    @hasSection('subnav')
                        @yield('subnav')
                    @elseif (isset($breadcrumbs))
                        {!! $breadcrumbs->render('bs4') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
