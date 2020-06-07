@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if(is_null($orders))
            @else


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Заказа</th>
                        <th scope="col">от</th>
                        <th scope="col">ФИО заказчика</th>
                        <th scope="col">Сумма:</th>
                        <th scope="col">Tовары</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td> {{$order->updated_at}}</td>
                            <td>{{$order->first_name}} {{$order->second_name}} {{$order->last_name}}</td>
                            <td> {{$order->final_price}}</td>
                            <td>Кнопка для просмотра Товаров</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
@endsection
