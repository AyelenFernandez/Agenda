<!DOCTYPE html>
<html>
    <head>
        <title>AGENDA</title>
        <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="msg">
            <div class="msg-title">
                <p>No tiene Autorizacion para ingresar a este sistema</p>
            </div>
            <div class="msg-back">
                <a href="{{ url('logout') }}">Inicio</a>
            </div>
        </div>
    </body>
</html>