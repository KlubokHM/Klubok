@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Оформление Заказа</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('customer.index.view.order')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control"  name="first_name"  required autocomplete="first_name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="second_name" class="col-md-4 col-form-label text-md-right">Отчество</label>

                                <div class="col-md-6">
                                    <input id="second_name" type="text" class="form-control"  name="second_name"  value="{{ old('second_name')}}" required autocomplete="second_name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"   required autocomplete="last_name" autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control" name="phone"   required autocomplete="phone" autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" required autocomplete="city" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Адресс</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" required autocomplete="street" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="building" class="col-md-4 col-form-label text-md-right">Дом</label>

                                <div class="col-md-6">
                                    <input id="building" type="text" class="form-control" name="building" required autocomplete="building" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="room_number" class="col-md-4 col-form-label text-md-right">Квартира</label>

                                <div class="col-md-6">
                                    <input id="room_number" type="text" class="form-control" name="room_number" required autocomplete="room_number" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="index" class="col-md-4 col-form-label text-md-right">Почтовый индекс</label>

                                <div class="col-md-6">
                                    <input id="index" type="text" class="form-control" name="index" required autocomplete="index" autofocus>
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
