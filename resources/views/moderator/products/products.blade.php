@extends('moderator.layout_moderator.moderator-app')

@section('container')
    <div class="container">
        <div class="row p-5">
            <div class="col-md-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create"  >
                    Создать
                </button>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="m-3 card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Доп. имя : {{$product->sub_name}}</li>
                                <li class="list-group-item">Цена : {{$product->price}}.00p</li>
                                <li class="list-group-item">Категория : {{$product->category ? $product->category->name:'Без категории'}}</li>
                                <li class="list-group-item">Статус : @if($product->is_publish) Активен @else Неактивен @endif </li>
                            </ul>
                            <div class="card-body">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-id ="{{$product->id}}"
                                        data-name = "{{$product->name}}"
                                        data-subname = "{{$product->sub_name}}"
                                        data-org_id = "{{$product->institution->id}}"
                                        data-category="{{$product->category ? $product->category->name:'Без категории'}}"
                                        data-price="{{$product->price}}"
                                        data-description="{{$product->description}}"  data-target="#edit" >
                                    Изменить
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"  >
                                    Удалить
                                </button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Изменение Товара</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('moderator.products.update', 'id')}}">
                        @method("PATCH")
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="org_id" class="form-control" id="org_id">
                        </div>
                        @include('moderator.category.include.form')
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
                    <h5 class="modal-title" id="edit">Создать Товар</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('moderator.products.store')}}">
                        @csrf
                        @include('moderator.category.include.form')
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
            var subname = button.data('subname')
            var category = button.data('category')
            var price = button.data('price')
            var description = button.data('description')
            var org_id = button.data('org_id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #subname').val(subname);
            modal.find('.modal-body #category').val(category);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #org_id').val(org_id);
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

