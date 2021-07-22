<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CIIDEPT</title>
    <link rel="stylesheet" href="{{ asset('css/login-ciidept.css') }}">
</head>
<body>
    <div class="login-ciidept">
    {!! Form::open(array('url' => '/login', 'method' => 'POST', 'class' => 'form-log')) !!}
        {!! csrf_field() !!}
        <h1>CIIDEPT - Login</h1>
        
        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::email('email', old('email') , array('id' => 'email', 'placeholder' => 'E-Mail')) !!}
            {!! Form::label('email', 'Nombre', array()) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::password('password', array('id' => 'user', 'placeholder' => 'Password')) !!}
            {!! Form::label('password', 'Password', array()) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        {!! Form::submit('Ingresar', array('id' => 'btn-submit-material')) !!}
    {!! Form::close() !!}
    </div>
</body>
<script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</html>