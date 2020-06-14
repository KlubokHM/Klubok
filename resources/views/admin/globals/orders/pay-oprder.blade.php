@extends('admin.globals.orders.layout-order.order-app')

@section('order-place')
                @if(is_null($orders))
                @else
                    <h4 class="m-3 text-center">Оплаченные Заказы</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Заказа</th>
                            <th scope="col">от</th>
                            <th scope="col">ФИО заказчика</th>
                            <th scope="col">Сумма:</th>
                            <th scope="col">Детали</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @if($order->status)

                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td> {{$order->updated_at}}</td>
                                    <td>{{$order->first_name}} {{$order->second_name}} {{$order->last_name}}</td>
                                    <td> {{$order->final_price}}</td>
                                    <td><button type="button"  class="btn btn-warning"  >
                                            <a href="{{route('order.details',[$order->id])}}">
                                                Детали
                                            </a>
                                        </button></td>
                                </tr>

                            @endif
                        @endforeach
                        </tbody>
                    </table>

                @endif


@endsection
