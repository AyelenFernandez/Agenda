<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="description" content="">
    <meta name="CIIDEPT - Tucumán" content="">

    <META HTTP-EQUIV="refresh" CONTENT="360; URL=http://agenda.innovacioneducativa.gob.ar/">
    
    <title>Reservas</title>
    
    <link rel="apple-touch-icon" href="favicon.ico">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/icomoon.css">    
    <link rel="stylesheet" href="css/reservaTv.css">

</head>
<body>

<div class="container-fluid">
    <div class="row agendaDiaTv">

        <div class="col-md-4 col-md-offset-8 hidden-xs ">
            <figure id="idLogo">
                <img src="{{asset('img/cmg.png')}}" alt="CIIDEPT">
            </figure>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 tableAgeRes">
            @if($arreglo != null)
            
                <table class="table table-condensed ">
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Organizador</th>
                            <th>Horario</th>
                            <th>Lugar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($arreglo as $key)
                        @if($key['estado'] == 'cancelado')
                            <tr class="eventoCancelado">
                                <td>{!! $key['evento'] !!}</td>
                                <td>{!! $key['organizador']  !!}</td>
                                <td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
                                <td>Cancelado</td>
                            </tr>
                        @else
                            <tr>
                                <td>{!! $key['evento'] !!}</td>
                                <td>{!! $key['organizador']  !!}</td>
                                <td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
                                <td class="espFisicoTv">

                                @for ($i=0; $i < count($key['aulas']) ; $i++)
                                    @if($key['ubicacion'][$i] == 'Planta Alta')
                                        <div>
                                            {!! $key['aulas'][$i]  !!}&nbsp;
                                            <i class="icon-arrow-up2"></i>
                                        </div>
                                     @else
                                        <div>
                                            {!! $key['aulas'][$i]  !!}&nbsp;
                                            <i class="icon-arrow-down2"></i>
                                        </div>
                                    @endif
                                @endfor
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            @else
                <center>
                <h2>Hoy no hay Eventos Programados</h2>
                </center>
            @endif
        </div>
    </div>

    <div class="row agendaDiaTv">
        <div class="col-md-4 text-center">
            <span class=""><i class="icon-arrow-up2"></i><strong>&nbsp;PA:&nbsp;</strong> Planta Alta</span>
        </div>
        
        <div class="col-md-4 col-md-offset-4 text-center">
            <span class=""><i class="icon-arrow-down2"></i><strong>&nbsp;PB:&nbsp;</strong> Planta Baja</span>
        </div>
    </div>
</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>