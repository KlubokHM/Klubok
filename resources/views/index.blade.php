@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('customer.index.view.product',[$product ->id])}}">{{$product ->name}}</a>
                                </h4>
                                <h5>{{$product ->price}}</h5>
                                <p class="card-text">{{$product -> description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
