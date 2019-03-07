@extends('layouts.app')
    @section('content')
        <div id="wrapper">
            @include('admin.partials.nav-default')
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    @include('admin.partials.search')
                </div>
                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h2>Users</h2>
                                    <p>
                                        All users shown below are verified users.
                                    </p>
                                    <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <span class="pull-right small text-muted"></span>
                                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-user"></i> Users</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-2" class="tab-pane">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <tbody>
                                                        @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td><i class="fa fa-flag"></i>{{$user->id}}</td>
                                                            <td class="client-status"><span class="label label-primary">Active</span></td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2017
                    </div>
                </div>

    </div>
</div>
@stop