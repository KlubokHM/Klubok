@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 mb-4">

        <div class="col-lg-12">
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
                            @foreach($order->products as $product)
                                <tr>
                                <td>
                                    <a href="{{route('customer.index.view.product',[$product])}}">{{$product->name}}</a>
                                </td>
                                <td></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
