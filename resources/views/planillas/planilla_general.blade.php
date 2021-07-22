<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Cumpleaños</title>
<!--   
<link rel="stylesheet" href="{{asset('css/planilla.css')}}">
<link rel="stylesheet" href="{{asset('css/planilla.css')}}"> -->
  <link href="{{ asset('css/planilla.css') }}" rel='stylesheet' />

  
</head>

<body>
  <table border="1" class="table table-condensed">

  <!-- logos ministerio de educacion + coordinacion de innovacion educativa -->
  <tr>
    
    <td align="center" colspan="12" class="sin_borde">
        <img src="{{asset('img/CieEduGob.png')}}" alt="logo coordinacion de innovacion educativa - Gobierno de Tucuman" class="logo_fix">
    </td>
  </tr>
  <!-- titulo de la planilla  -->
  <tr>   
   <td id="titulo" name="titulo" colspan="12" class="centrado negrita">PLANILLA DE EVENTOS</td>
  </tr>
    
  <tr class="centrado">
    <td colspan="3">
      Evento
    </td>
    <td colspan="3">
      Organizador
    </td> 
    <td colspan="3">
      Horario
    </td>
    <td colspan="3">
      Fecha
    </td>    <!-- 
    <td class="izq">
      Esp. Físico
    </td>     -->
  </tr>
  <tbody>
  @foreach($arreglo as $key)
   <tr>
            <td colspan="3">{!! $key['Nombre del Evento'] !!}</td>
            <td colspan="3">{!! $key['Organizador'] !!}</td>
            <td colspan="3" class="centrado">{!! $key['Inicia'] !!} - {!! $key['Termina'] !!}</td>
            <td colspan="3" class="centrado">{!! $key['Fecha'] !!}</td><!-- 
            <td class="izq">{!! $key['Espacio Fisico'] !!}</td> -->
  </tr>
  @endforeach


  </tbody>
  <!-- 
  <tr class="centrado hoja">   
        
  </tr> -->

  </table>

</body>
</html>


      