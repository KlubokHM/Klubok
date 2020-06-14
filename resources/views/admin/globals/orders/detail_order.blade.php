@extends('admin.layout_admin.admin-app')

@section('container')


    <div class="container">
        <h3 class="m-3 text-center">Номер заказа : {{$order->id}}</h3>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-4 m-2 text-dark" >
                <h4 class="mt-4 text-center">Профиль Закзчика</h4>
                <div class="card p-4 justify-content-center bg-dark" >
                    <img src="{{asset($user->avatar)}}" alt="" class="card-img-top justify-content-center"  style="width: 15vw; margin: 0 auto;">
                    <div class="card-body">
                        <ul class="list-group list-group-item-dark text-uppercase">
                            <li class="list-group-item">{{$user->name}}</li>
                            <li class="list-group-item">{{$user->phone}}</li>
                            <li class="list-group-item">{{$user->email}}</li>
                        </ul>
                    </div>
                </div>
                </div>

            <div class="col-md-6 m-3 justify-content-center">
                <h4 class="mt-4 text-center">Информация о Заказе</h4>
                <div class="card p-4 justify-content-center bg-dark" >
                    <div class="card-body">
                                <ul class="list-group list-group-item-dark text-uppercase">
                                    <li class="list-group-item">ФИО : {{$order->first_name}} {{$order->second_name}} {{$order->last_name}}</li>
                                    <li class="list-group-item">Телефон : {{$order->phone}}</li>
                                    <li class="list-group-item">Почта : {{$order->email}}</li>
                                    <li class="list-group-item text-danger">Сумма : {{$order->final_price}}.00p</li>
                                    <li class="list-group-item">Город : {{$order->city}}</li>
                                    <li class="list-group-item">Адрес : {{$order->street}} {{$order->building}} {{$order->room_number}}</li>
                                    <li class="list-group-item">Почтовый Индекс : {{$order->index}}</li>
                                    <li class="list-group-item">Статус : {{$order->status}}</li>
                                    <li class="list-group-item">Статус Оплаты : Ожидает оплаты</li>
                                </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-3 ">
            <table id="cart" class="table table-condensed bg-dark text-light">
                <thead>
                <tr>
                    <th style="width:50%">Товары</th>
                    <th style="width:40%">Идентификатор продукта</th>
                    <th style="width:10%">Цена</th>
                    <th style="width:8%">Количество</th>
                    <th style="width:22%" class="text-center">Стоимость</th>

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
                        <td data-th="id">{{$product->id}}</td>
                        <td data-th="Price">{{$product->price}}.00p</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{$product->pivot->count}}" disabled>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$product->getPriceForCount()}}.00p</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
