@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-12">
            <div class="row">
                <div class="started-template">
                    <h1>Корзина</h1>
                    <p1>Список товаров</p1>
                    <div class="panel">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Нозвание</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                    <th>Стоимость</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($order))
                            @foreach($order->products as $product)


                                <tr>
                                <td>
                                    <a href="{{route('customer.index.view.product',[$product])}}">{{$product->name}}</a>
                                </td>
                                <td><span class="badge">{{$product->pivot->count}}</span>
                                    <div class="btn-group form-inline">
                                        <form action="{{route('customer.index.view.basket.remove', [$product])}}" method="POST">
                                            <button type="submit" class="btn btn-danger" href=""><span
                                                    class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                            @csrf
                                        </form>
                                        <form action="{{route('customer.index.view.basket.add', [$product])}}" method="POST">
                                            <button type="submit" class="btn btn-success"
                                                    href=""><span
                                                    class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->getPriceForCount()}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Общая стоимсоть:</td>
                                <td></td>
                                <td></td>
                                <td>{{$order->getFullPrice()}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="{{route('customer.index.view.order.form')}}">Оформить заказ</a></td>
                                @else
                                    <td></td>
                                    <td>Корзина пуста</td>
                                    <td></td>
                                    <td><a href="{{route('customer.index.view.products')}}">Перейти к Товарам</a></td>
                            </tr>
                            </tbody>


                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
