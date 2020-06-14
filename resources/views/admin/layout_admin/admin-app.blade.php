<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Oswald&display=swap" rel="stylesheet">
    <!-- Styles -->

    <link href="{{asset('css/app.css') }}" rel="stylesheet" type="text/css">


</head>
<body>
    <div class="container">
        <h4 class="mt-3 text-center"><a href="{{route('admin.panel.view')}}">Панель администратора</a></h4>
        <nav class="navbar mt-3 navbar-expand-lg navbar-dark bg-dark justify-content-between">
                <ul class="navbar-nav justify-content-start">
                    <li class="nav-item ml-3">
                        <a class="nav-link  text-light" href="{{route('admin.index.view.orders')}}">Заказы<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link text-light" href="#">Товары</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link text-light" href="#">Контрагенты</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link text-light" href="#">Мастерклассы</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-link">
                        <a href="{{route('customer.index.view')}}" class="nav-link text-light">В магазин</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="nav-link text-light">
                        {{ __('Выйти') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
        </nav>
    </div>
    <div class="container">
        @yield('container')
    </div>
@yield('script')
</body>
</html>
