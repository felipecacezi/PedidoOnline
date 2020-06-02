<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos Online</title>
    <script src="{{ url('assets/jQuery/jQuery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <script src="https://kit.fontawesome.com/dacbc58df6.js" crossorigin="anonymous"></script>
    <style>
        #sidebar {            
            height: 100vh;
        }
    </style>

</head>
<body>

    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
        <div class="flex-row d-flex">
            <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">Pedidos Online</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar">

            <ul class="navbar-nav"></ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#myAlert" data-toggle="collapse">Alertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Sair</a>
                </li>
            </ul>

        </div>
    </nav>
    
    <div class="container-fluid" id="main">
        
        <div class="row row-offcanvas row-offcanvas-left">

            <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation">
                <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">

                    <li class="nav-item">
                        <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Controle de Estoque▾</a>
                        <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/itens') }}">Itens</a></li>                           
                            <li class="nav-item"><a class="nav-link" href="{{ url('/produto') }}">Produtos</a></li>                           
                            <li class="nav-item"><a class="nav-link" href="{{ url('/unidade_medida') }}">Unidades de Medida</a></li>                           
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Pedidos▾</a>
                        <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
                           <li class="nav-item"><a class="nav-link" href="">Lista de Pedidos</a></li>                           
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!--/col-->
    
            <div class="col main pt-5 mt-3">
              
                @yield('content')
    
            </div>
            <!--/main col-->
        </div>
    
    </div>
    <!--/.container-->
    {{-- <footer class="container-fluid">
        <p class="text-right small">©2020 PedidoOnline</p>
    </footer> --}}
    
    
    

    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>    
</body>
</html>