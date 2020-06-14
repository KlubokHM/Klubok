@extends('admin.layout_admin.admin-app')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-5">
                <ul class="nav navbar-nav bg-dark flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.orders')}}">Все Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.orders.active')}}">Активные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.orders.pay')}}">Оплаченные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.orders.finished')}}">Завершонные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.orders.pay')}}">Отмененные</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                @yield('order-place')
            </div>
        </div>
    </div>

@endsection
