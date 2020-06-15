@extends('admin.globals.statements.layout-statement.statement-app')

@section('statement_palce')
                @foreach($i_statements as $instotution)
                <h4>id Организации : {{$instotution->id}}</h4>
                <div class="card @if(!is_null($indicator)) bg-danger @else bg-dark @endif  text-light" style="width: 40rem;">
                    <div class="card-body">
                        <h5 class="card-title">Название : {{$instotution->name}}</h5>
                        <p class="card-text">Описание : {{$instotution->discription}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">Почта : {{$instotution->email}}</li>
                        <li class="list-group-item text-dark">Телефон : {{$instotution->phone}}</li>
                        <li class="list-group-item text-dark">Адресс : {{$instotution->address}}</li>
                        <li class="list-group-item">
                            @if(!is_null($indicator))
                                <button class="btn p-2 btn-warning"><a href="{{route('admin.statements.activation_institution', [$instotution->id])}}">Разрешть</a></button>
                            @else
                                <button class="btn p-2 btn-warning"><a href="{{route('admin.statements.activation_institution', [$instotution->id])}}">Разрешть</a></button>
                                <button class="btn p-2 btn-danger"><a href="{{route('admin.statements.remove', [$instotution->id])}}">Откланить</a></button>
                            @endif
                        </li>
                    </ul>
                </div>
                @endforeach
@endsection
