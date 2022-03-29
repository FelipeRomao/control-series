<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control of Series</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"
    >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <header class="p-3 mb-3 border-bottom">
        @yield('navbar')
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="{{ route('series-list') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-light text-decoration-none">
                   <img alt="" src="{{ URL::to('icons/film.png') }}"
                        height="50"
                        width="50"
                        style="margin-right: 1rem"
                   />
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('series-list') }}" class="nav-link px-2 link-secondary">Series</a></li>
                </ul>

                @auth
                <div class="dropdown text-end">
                    <a href="#"
                       class="d-block link-dark text-decoration-none dropdown-toggle"
                       id="dropdownUser1"
                       data-bs-toggle="dropdown"
                       aria-expanded="false"
                    >

                        <img src="https://media-exp1.licdn.com/dms/image/C4E03AQF1YCCy-tJLhg/profile-displayphoto-shrink_800_800/0/1624295669264?e=1654128000&v=beta&t=HlGCmh3kWvRYPplJMFZUPTgS8leaTNt2Ia3eS602NgQ"
                             alt="mdo"
                             width="32"
                             height="32"
                             class="rounded-circle"
                        >
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
                @endauth

                @guest
                    <a href="/begin" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log in">
                        <i class="fa fa-user-circle-o"
                           aria-hidden="true"
                           style="font-size: 40px; cursor: pointer"
                        ></i>
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <div class="container py-4">
        <div class="pb-3 mb-4 border-bottom">
            <span class="navbar-brand mb-0 h1">@yield('header')</span>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
    ></script>

    <script>
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>
