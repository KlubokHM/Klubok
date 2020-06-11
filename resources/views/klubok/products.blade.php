@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Категории</h1>
                <div class="list-group">
                    <a href="{{route('customer.index.view.products')}}" class="list-group-item">Все категории</a>
                    @foreach($categories as $category)
                    <a href="{{route('customer.index.view.category',[$category->id])}}" class="list-group-item">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
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


                                    <form action="{{route('customer.index.view.basket.add', [$product])}}" method = "POST">
                                        <p>

                                            <a href="{{route('customer.index.view.product',[$product->id])}}" class="btn btn-default" role="button">
                                                Подробнее
                                            </a>
                                        </p>
                                     @csrf
                                    </form>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
