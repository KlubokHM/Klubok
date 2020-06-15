@extends('admin.layout_admin.admin-app')

@section('container')
    <h4 class="mt-3 text-center">Заявки на тарговую площадку</h4>
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-4 p-5">
            <ul class="nav navbar-nav bg-dark flex-column text-center">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('admin.statements')}}">Активные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('admin.statements.disable')}}">Откланенные</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            @yield('statement_palce')
        </div>

@endsection
