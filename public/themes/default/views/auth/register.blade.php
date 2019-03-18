@extends('layouts.login')

@section('content')
    <div class="card card-default">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                @if (!is_null($invitation))
                    {!! Form::hidden('invitation', $invitation) !!}
                @endif
                <div class="form-group row{{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                    <label for="first_name" class="col-sm-4 col-form-label">First Name</label>

                    <div class="col-sm-8">
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autofocus>

                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                    <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>

                    <div class="col-sm-8">
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" autofocus>

                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">E-Mail</label>

                    <div class="col-sm-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>

                    <div class="col-sm-8">
                        <input id="password" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password">

                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                    <label for="password-confirm" class="col-sm-4 col-form-label">Confirm Password</label>

                    <div class="col-sm-8">
                        <input id="password-confirm" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class=" mt-5 row justify-content-center text-center">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
