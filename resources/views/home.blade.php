@extends('layouts.app')
@section('bootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(is_null($orders))
                        @else
                        <div class="profile">
                            <h3>Профиль </h3>
                            <div class="user-card">

                                <div class="user-image-block">
                                    <img src="{{asset($user->avatar)}}" alt="" role="alert" class="user-img">
                                </div>
                                <div class="user-info">
                                    <h4>
                                        ИНФОРМАЦИЯ О ВАС
                                    </h4>
                                    <div class="info-box">
                                        <ul class="h-info">
                                            <li class="info-item">ЛОГИН</li>
                                            <li class="info-item">НОМЕР</li>
                                            <li class="info-item">ПОЧТА</li>
                                            <li class="info-item">ГОРОД</li>
                                        </ul>
                                        <ul class="h-info">

                                            <li class="info-item">{{$user->name}}</li>
                                            @if(!is_null($user->phone))
                                            <li class="info-item">{{$user->phone}}</li>
                                            @else
                                                <li class="info-item">нет номера</li>
                                            @endif
                                            <li class="info-item">{{$user->email}} </li>
                                            <li class="info-item">{{$user->city}} </li>

                                        </ul>
                                    </div>
                                    <div class="alter-form">
                                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#edit">
                                                <a href="#">Редактировать</a>
                                            </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">Заказы</div>
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
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="eidt_Title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eidt_Title">Редактирование профиля</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.update', [$user->id]) }} " enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                        <div class="col-md-6">
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-md-4 col-form-label text-md-right">avatar</label>

                                        <div class="col-md-6">
                                            <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}"  autocomplete="avatar">

                                        </div>
                                    </div>





                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('scripts')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
