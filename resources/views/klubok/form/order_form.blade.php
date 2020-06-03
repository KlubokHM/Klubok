@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Оформление Заказа</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"  name="name"  required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sname" class="col-md-4 col-form-label text-md-right">Отчество</label>

                                <div class="col-md-6">
                                    <input id="sname" type="text" class="form-control"  required autocomplete="sname">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control"  required autocomplete="lname">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" required autocomplete="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Адресс</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="city" required autocomplete="street">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="building" class="col-md-4 col-form-label text-md-right">Дом</label>

                                <div class="col-md-6">
                                    <input id="building" type="text" class="form-control" name="city" required autocomplete="building">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="room_number" class="col-md-4 col-form-label text-md-right">Квартира</label>

                                <div class="col-md-6">
                                    <input id="room_number" type="text" class="form-control" name="city" required autocomplete="room_number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="index" class="col-md-4 col-form-label text-md-right">Почтовый индекс</label>

                                <div class="col-md-6">
                                    <input id="index" type="text" class="form-control" name="city" required autocomplete="index">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Заказать
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
