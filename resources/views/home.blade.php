@extends('layouts.app')
@section('bootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Заказы</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(is_null($orders))
                        @else
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Заказа</th>
                                        <th scope="col">от</th>
                                        <th scope="col">Сумма:</th>
                                        <th scope="col">Tовары</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <th scope="row">{{$order->id}}</th>
                                        <td> {{$order->updated_at}}</td>
                                        <td> {{$order->final_price}}</td>
                                        <td>
                                            @foreach($order->products as $product)
                                                {{$product -> name}}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
