@extends('layouts.auth')

@section('page_title')
    Register
@stop

@section('section')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        {!! csrf_field() !!}
        <div class="form-content">
            <div class="form-group">
                <input type="text" class="form-control input-underline input-lg" id="" name="name"
                       placeholder={{ Lang::get(\Session::get('lang').'.fullname') }}
                               value={{ old('name') }}>
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-underline input-lg" id="" name="email"
                       placeholder={{ Lang::get(\Session::get('lang').'.email') }}
                               value={{ old('email') }}>>
            </div>

            <div class="form-group">
                <input type="password" class="form-control input-underline input-lg" id="" name="password"
                       placeholder={{ Lang::get(\Session::get('lang').'.password') }}>
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-underline input-lg" id="" name="password_confirmation"
                       placeholder={{ Lang::get(\Session::get('lang').'.repeatpass') }}>
            </div>
        </div>
        <input type="submit" class="btn btn-white btn-outline btn-lg btn-rounded progress-login"
               value="{{ Lang::get(\Session::get('lang').'.registerhere') }}"/>
        {{--<a href="/login" class="btn btn-white btn-outline btn-lg btn-rounded">{{ Lang::get(\Session::get('lang').'.loginpage') }}</a>--}}
    </form>
@stop

@section('js')

@stop




