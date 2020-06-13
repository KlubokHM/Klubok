@extends('layouts.app')
@section('bootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="py-1 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h2>Оформление Заказа</h2>
            <p class="lead"></p>
        </div>
        <!-- Проверка на ошибки валидации -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <ul>{{$error}}</ul>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="col-md-10  order-md-1 p-5 container" style="background: #000353; color: #dedee9 !important;">
                <h4 class="mb-3">Заполните форму</h4>
                <form class="needs-validation" novalidate method="POST" action="{{route('customer.index.view.order')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Иван" value="" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="secondName">Отчество</label>
                            <input type="text" name="second_name" class="form-control" id="firstName" placeholder="Иванович" value="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Иванов" value="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">1
                        <label for="username">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" name="email" placeholder="you@example.co" required>
                            <div class="invalid-feedback" style="width: 100%;">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Телефон</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="+7" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city">Город</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Москва" value="" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="street">Улица</label>
                            <input type="text" name="street" class="form-control" id="street" placeholder="Мира" value="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="building">Дом</label>
                            <input class="form-control" id="building" name="building" required>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="room">Квартира</label>
                            <input class="form-control" id="room" name="room_number" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Индекс</label>
                            <input type="text" class="form-control" id="zip"  name="index" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Продолжить</button>
                </form>
            </div>
        </div>


    </div>


@endsection
