@extends('layouts.app')
@section('bootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="all-products">
        <div class="title">
            <div>
                <h2>ТОВАРЫ</h2>
            </div>
        </div>
        <div class="all-product-box">
            <div class="selection">
                <div class="titel-filters">
                    Организации
                </div>
                <nav class="nav flex-column">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">
                            <a href="{{route('customer.index.view.products')}}">
                                Все Товары
                            </a>
                        </button>
                    </div>
                    @foreach($institutions as $institution)
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-light"> <a href="{{route('customer.index.view.institutions',[$institution->id])}}" >{{$institution->name}}</a></button>
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @foreach($institution->find($institution->id)->categories as $category)
                                    <a href="{{route('customer.index.view.category',[$category->id])}}" class="dropdown-item text-center">
                                        {{$category->name}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </nav>
            </div>
            <div class="product-box">
                <h3>

                </h3>
                <div class="products-container id1">
                    @foreach($products as $product)
                        <div class="product">
                            <div class="product-title">
                                <a href="{{route('customer.index.view.product',[$product->id])}}">{{$product ->name}}</a>
                            </div>
                            <div class="product-body">
                                <div class="product-image">
                                    <img src="http://placehold.it/250x200" class="product-img" alt="">
                                </div>
                                <div class="div-product-body-footer">
                                    <div class="product-basket">
                                        <form id="add-form" action="{{route('customer.index.view.basket.add',[$product])}}" method="POST">
                                            <button type="submit" class="btn btn-warning ">
                                                <img src="{{asset('img/cart.svg')}}" alt="" class="basket">
                                            </button>
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="product-price">
                                        Цена:  {{$product ->price}}.00p
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection



