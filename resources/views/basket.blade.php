@extends('layouts.app')
@section('bootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
            <div class="py-1 text-center">
                <h2>Корзина</h2>
            </div>
    </div>
    <div class="container">
        @if(!empty($order))
        <table id="cart" class="table table-hover table-condensed ">
            <thead>
            <tr>
                <th style="width:50%">Продукты</th>
                <th style="width:10%">Цена</th>
                <th style="width:8%">Количество</th>
                <th style="width:22%" class="text-center">Стоимость</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>

                @foreach($order->products as $product)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="nomargin"><a href="{{route('customer.index.view.product',[$product])}}">{{$product->name}}</a></h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{$product->price}}.00p</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="{{$product->pivot->count}}" disabled>
                </td>
                <td data-th="Subtotal" class="text-center">{{$product->getPriceForCount()}}.00p</td>
                <td class="actions row">
                   <form action="{{route('customer.index.view.basket.add', [$product])}}" method="POST">
                       <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh">
                                @csrf
                           </i></button>
                   </form>
                    <form action="{{route('customer.index.view.basket.remove', [$product])}}" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o">
                                @csrf
                            </i></button>
                    </form>
                </td>
            </tr>
                @endforeach

            </tbody>
            <tfoot>
            <tr>
                <td><a href="{{route('customer.index.view.products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Вернутся к товарам</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Общая стоимость: {{$order->getFullPrice()}}.00p</strong></td>
                <td><a href="{{route('customer.index.view.order.form')}}" class="btn btn-success btn-block">Оплатить<i class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>

        </table>
        @else
            <div class="py-1 text-center">
                <h4>Ваша корзина пуста</h4>
                <p class="lead"><a href="{{route('customer.index.view.products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Перейти к товарам</a></p>
            </div>


        @endif
    </div>




@endsection
