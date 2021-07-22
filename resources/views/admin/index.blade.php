@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Eventos del Día</span>
@endsection

@section('body')
<link rel="stylesheet" href="{{asset('css/reservaTv.css')}}">

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
                            @foreach($key['aulas'] as $aula)
                                <div>{!! $aula  !!}</div>
                                {{-- <i class="icon-arrow-up2 text-danger"></i> --}}
                            @endforeach
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

@endsection
