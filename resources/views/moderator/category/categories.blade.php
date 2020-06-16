@extends('moderator.layout_moderator.moderator-app')

@section('container')
    <div class="container">
        <div class="row p-5">
            <div class="col-md-9">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Название</th>
                        <th></th>
                        <th></th>
                        <th>
                            Обнавлено
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td >{{$category->name}}</td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-id="{{$category->id}}" data-name="{{$category->name}}" data-target="#edit"  >
                                    Изменить
                                </button></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"  data-id="{{$category->id}}" data-name="{{$category->name}}">
                                    Удалить
                                </button></td>

                            </td>
                            <td>{{$category->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create"  >
                    Создать
                </button>
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">Изменение Категорий</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('moderator.category.update', 'id')}}">
                            @method("PATCH")
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" id="id">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Название:</label>
                                <input class="form-control" name="name" id="name">
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">Создать Категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('moderator.category.store')}}">
                            @csrf
                            <div class="form-group">

                                <input type="hidden" name="id" class="form-control" id="id">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Название:</label>
                                <input class="form-control" name="name" id="name">
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger text-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">Удалить Категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-light text-center">Вы действительно хотите удалить категорию
                        ?</h4>
                        <form method="POST" action="{{route('moderator.category.delete')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" id="id">
                                <input type="hidden" name="name" class="form-control" id="name">
                            </div>

                            <button type="button" class="btn btn-warning" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">да я хочу удалить категорию</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        @endsection

@section('script')
             <script type="text/javascript">

                $('#edit').on('show.bs.modal', function (event) {
                    console.log("edit")
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var modal = $(this)

                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                })
            </script>
            <script type="text/javascript">

                $('#delete').on('show.bs.modal', function (event) {
                    console.log("delete")
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var modal = $(this)

                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                })
            </script>

@endsection
