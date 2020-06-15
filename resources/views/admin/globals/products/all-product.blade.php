@extends('admin.globals.products.layout-product.product-app')



@section('products-place')
    <div class="row justify-content-center">
        @foreach($products as $product)

            <div class="card m-3" style="max-height: 300px; max-width: 250px">
                <!-- Card content -->
                <div class="card-body @if($product->is_publish) bg-success @else bg-danger @endif text-light">
                    <!-- Title -->
                    <h4 class="card-title">{{$product->name}}</h4>
                    <!-- Text -->
                    <p class="card-text">{{$product->description}}</p>
                    <!-- Button -->
                    @if($product->is_publish)
                        <a href="{{route('admin.index.view.products.publish-products.edit',[$product->id])}}" class="btn btn-danger">Снять с Витрины</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

@endsection
