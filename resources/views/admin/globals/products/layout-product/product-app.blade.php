@extends('admin.layout_admin.admin-app')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-5">
                <ul class="nav navbar-nav bg-dark flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.products.all')}}">Все Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.products.publish-products')}}">Опубликованные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('admin.index.view.products.not-publish-products')}}">Неопубликованные</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                @yield('products-place')
            </div>
        </div>
    </div>

@endsection
