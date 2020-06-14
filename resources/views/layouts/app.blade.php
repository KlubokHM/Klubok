<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @yield('bootstrap')
    <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css">


</head>
<body>
<header>
    <div class="top-menu">
        <ul class="top-menu-list-left ">
            <li class="top-menu-item_l">
                <a href="{{route('customer.index.view')}}">
                    ГЛАВНАЯ
                </a>
            </li>
            <li class="top-menu-item_l">
                <a href="{{route('customer.index.view.products')}}">
                    ТОВАРЫ
                </a>
            </li>
            <li class="top-menu-item_l">
                <a href="#">
                    МАСТЕР КЛАССЫ
                </a>
            </li>
            <li class="top-menu-item_l">
                <a href="#">
                    О НАС
                </a>
            </li>
            <li class="top-menu-item_l">
                <a href="#">
                    КОНТАКТЫ
                </a>
            </li>
        </ul>
        <ul class="top-menu-list-right">
            <li class="top-menu-item_r">
                <a href="{{route('customer.index.view.basket')}}">
                    <img src="{{asset('img/cart.svg')}}" alt="" class="checkout">
                </a>
            </li>
            @guest
                <li class="top-menu-item_r">
                    <a href="{{ route('login') }}">{{ __('ВХОД') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="top-menu-item_r">
                        <a href="{{ route('register') }}">{{ __('РЕГИСТРАЦИЯ') }}</a>
                    </li>
                @endif
            @else
                <li class="top-menu-item_r">
                    <div class="dropfirst">
                        <a href="#" class="drop">{{ Auth::user()->name }}</a>

                        <ul class="dropdown">
                            <li class="item-dropdown">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('ВЫЙТИ') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li class="item-dropdown">
                                <a href="{{ route('customer.index.view.home') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('my-home').submit();">
                                    Мои Заказы
                                </a>


                                <form id="my-home" action="{{ route('customer.index.view.home') }}" method="get"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <li class="item-dropdown">
                                    <a href="{{ route('admin.panel.view') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('admin-form').submit();">
                                        Панель администратора
                                    </a>
                                    <form id="admin-form" action="{{ route('admin.panel.view') }}" method="get"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->isModerator())
                                <li class="item-dropdown">
                                    Moderator
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</header>

        <main>
            @yield('content')
        </main>
<footer>
    <div class="info">
        <div class="info-box">

        </div>
        <div class="div coperaiting">

        </div>
    </div>
</footer>
@yield('scripts')
</body>
</html>
