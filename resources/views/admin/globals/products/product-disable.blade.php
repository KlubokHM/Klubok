@extends('admin.globals.products.layout-product.product-app')



@section('products-place')
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>Товар : {{$product->id}}</h4>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Название : {{$product->name}}</h5>
                    <p class="card-text">Описание : {{$product->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Цена : {{$product->price}}.00p</li>
                    <li class="list-group-item">Категория : {{$product->category->name}}</li>
                    <li class="list-group-item">Владелец : {{$product->institution->name}}</li>
                </ul>

            </div>
            <a href="{{route('admin.index.view.products.all')}}" class="btn btn-primary m-3">Вернуться к Товарам</a>
        </div>
        <div class="col-md-6">
            <form method='POST' action="{{route('admin.index.view.products.publish-products.update',[$product->id])}}">


                <div class="form-group">
                    <label for="description">Причина Снятия с Публикации</label>
                    <textarea class="form-control" name="description" id="description" rows="3" maxlength="255"></textarea>
                </div>
                @csrf
                <button type="submit" class="btn btn-danger">Снять с Витрины</button>
            </form>
        </div>
    </div>

@endsection
