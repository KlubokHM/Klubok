@extends('layouts.app')

@section('content')
    <div class="image">
        <img src="{{asset('img/fon_klubok.png')}}" alt="" class="index_klubok">
    </div>
    <section class="about-us">
        <div class="title">
            <div>
                <h2>O НАС</h2>
            </div>
        </div>
        <div class="about-us-container">
            <div class="logo">
                <img src="http://placehold.it/450x400" alt="" class="logo-img" >
            </div>
            <div class="about-us-text">
                <div class="about-us-text-title">
                    <p>КЛУБОК</p>
                </div>
                <div class="about-us-text-body">
                    Задача организации, в особенности же дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки существенных финансовых и административных условий. Разнообразный и богатый опыт реализация намеченных плановых заданий позволяет оценить значение модели развития. Равным образом дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации направлений прогрессивного развития.
                </div>
            </div>
        </div>
    </section>
    <section class="products">
        <div class="title">
            <div>
                <h2>ПРОДУКТЫ</h2>
            </div>
        </div>
        <div class="products-container">
            @foreach($products as $product)
            <div class="product">
                <div class="product-title">
                    <a href="{{route('customer.index.view.product',[$product ->id])}}">{{$product ->name}}</a>
                </div>
                <div class="product-body">
                        <div class="product-image">
                            <img src="http://placehold.it/250x200" class="product-img" alt="">
                        </div>
                    <div class="div-product-body-footer">
                        <div class="product-basket">
                            <a href="{{route('customer.index.view.basket.add', [$product])}}"
                               onclick="event.preventDefault();
                                                             document.getElementById('add-form').submit();">
                                <img src="{{asset('img/cart.svg')}}" alt="" class="basket">
                            </a>
                            <form id="add-form" action="{{route('customer.index.view.basket.add', [$product])}}" method="POST"
                                  style="display: none;">
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
    </section>
    <section class="callback">
        <div class="title">
            <div>
                <h2>КОНСУЛЬТАЦИЯ</h2>
            </div>
        </div>
        <div class="callback-us-container">
            <div class="call">
                <img src="{{asset('img/call.png')}}" alt="" class="call-img" >
            </div>
            <div class="callback-us-text">
                <div class="callback-us-text-title">
                    <h3>ТЕЛЕФОН</h3>
                </div>
                <div class="callback-us-text-body">
                        +7-(996)-328-02-89<br>
                        +7-(982)-557-61-04
                </div>
            </div>
        </div>
    </section>









@endsection
