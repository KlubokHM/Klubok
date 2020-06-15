@extends('admin.layout_admin.admin-app')

@section('container')
    <div class="row justify-content-center mt-5 ">
        @foreach($institutions as $instotution)
            <div class="col-md-6">
                <h4>id Организации : {{$instotution->id}}</h4>
                <div class="card bg-dark text-light" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Название : {{$instotution->name}}</h5>
                        <p class="card-text">Описание : {{$instotution->discription}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">Почта : {{$instotution->email}}</li>
                        <li class="list-group-item text-dark">Телефон : {{$instotution->phone}}</li>
                        <li class="list-group-item text-dark">Адресс : {{$instotution->city}}, {{$instotution->address}}</li>
                        <li class="list-group-item "><button class="btn p-2 btn-warning"><a href="#">Подробнее</a></button>
                            <button class="btn p-2 btn-danger"><a href="{{route('admin.statements.remove', [$instotution->id])}}">Заблокировать</a></button>
                        </li>
                    </ul>

                </div>
            </div>

        @endforeach


@endsection
