@extends('layouts.app')

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

                            @foreach($orders as $order)
                                <h4>Заказ - {{$order->id}}</h4>
                                <echo>{{$order->first_name}}</echo><br>
                                <h5>товары</h5>
                                @foreach($order->products as $product)
                                    <echo>{{$product->name}}</echo><br>
                                @endforeach
                                <br>
                            @endforeach
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
