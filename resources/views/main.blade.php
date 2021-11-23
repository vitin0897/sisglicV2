<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags *********************************************************************-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Local CSS **********************************************************************************-->
    <link rel="stylesheet" href="/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-icons-1.7.0">
    <link rel="stylesheet" href="/css/style.css">

    <!-- titulo ***********************************************************************************-->
    <title>@yield('title')</title>
</head>

<body>
    <!-- NavBar ************************************************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">SISGLIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/softwares">Softwares</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/status">Status</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/tipos">Tipos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/computadores">Patrimonios</a>
                    </li>

                    <li class="nav_item">
                        <form class="d-flex" action="/" method="GET">
                            <input type="text" id="search" name="search" class="form-control" placeholder="">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li class="nav_item">
                        <form class="d-flex" action="/" method="GET">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Licença...">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Pagina *************************************************************************************-->
    @yield('content')

    <!-- JS ****************************************************************************************-->
    <script src="/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
</body>

</html>