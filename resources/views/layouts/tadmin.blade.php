<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>AGENDA</title>
    
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/reserva.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    @yield('link')
</head>
<body class="hold-transition skin-black-light sidebar-mini">
    @if (!Auth::guest())
    <div class="wrapper">
        <header class="main-header">
            <span class="hidden-xs logo">
                <span class="logo-mini">
                    <figure><img alt="" src="{{asset('img/MiniEduGobTuc2016Cir.png')}}" class="img-responsive" /></figure>
                </span>
                <span class="logo-lg">
                    <figure><img alt="" src="{{asset('img/MiniEduGobTuc2016.png')}}" class="img-responsive" /></figure>
                </span>
            </span>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('img/MiniEduGobTuc2016Cir.png')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{asset('img/MiniEduGobTuc2016Cir.png')}}" class="img-circle" alt="User Image">
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Admin {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <a href="{!! url('/admin/changepass') !!}" class="btn btn-default btn-block">Cambiar Contraseña</a>
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-block">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <!-- <div class="user-panel">
                    <div class="">
                        <img src="{{asset('img/CiideptSolo.png')}}" class="img-thumbnail img-responsive" alt="User Image">
                    </div>
                </div> -->
                <!-- ASIDE -->
                @yield('navigation')
            </section>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs"><b>CIIDEPT</b></div>
            <strong>Copyright &copy; 2016.</strong>
        </footer>
    </div>
    @endif

<script src="{{ asset('js/jquery224.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="  sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/reservas.js') }}" type="text/javascript" charset="utf-8"></script>
    
    
    <script language="JavaScript" type="text/javascript">
    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>"+hours+":"+minutes+":"
         +seconds+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5
         //-->
     </script>
    @yield('scripts')

</body>
</html>
