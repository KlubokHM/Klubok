@extends('layouts.app')
@section('bootstrap')
    <link href="{{asset('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="container">

        <div class="col-md-10  order-md-1 p-5 container" style="background: #000353; color: #dedee9 !important;">
            <h4 class="mb-3">Заполните форму</h4>
            <form class="needs-validation" novalidate method="POST" action="{{route('customer.institution.statement.create')}}">
                @csrf
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="full_name">Полное имя организации</label>
                        <input type="text" name="full_name" class="form-control" id="full_name"  value="" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="name">Сокращенное имя организации</label>
                        <input type="text" name="name" class="form-control" id="name"  value="" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                </div>

                <div class="mb-3">
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
                    <label for="phone">Основной Телефон</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="+7" required>
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone_reserve">Телефон</label>
                    <input type="tel" class="form-control" name="phone_reserve" id="phone_reserve" placeholder="+7" required>
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="city">Город</label>
                        <input type="text" name="city" class="form-control" id="city"  value="" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="street">Улица</label>
                        <input type="text" name="street" class="form-control" id="street"  value="" required>
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
                        <label for="zip">Почтовы Индекс</label>
                        <input type="text" class="form-control" id="zip"  name="index" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website"  name="website" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="discription">Описание</label>
                    <textarea type="tel" class="form-control" rows="3" maxlength="255" name="discription" id="discription"  required>
                        </textarea>
                    <div class="invalid-feedback">

                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Продолжить</button>
            </form>
        </div>
    </div>
@endsection
