
<div class="form-group">
    <label for="name" class="col-form-label">Название:</label>
    <input class="form-control" name="name" id="name">
</div>
<div class="form-group">
    <label for="subname" class="col-form-label">Сокращенное Название:</label>
    <input class="form-control" name="subname" id="subname">
</div>
<div class="form-group">
    <label for="category" class="col-form-label">Категория:</label>
    <select class="form-control" id="category" name="category">
        @foreach(\App\Model\Institution::all()->find(\App\Model\User::all()->find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->institutions_id)->categories as $category)
            <option >{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="price" class="col-form-label">Цена:</label>
    <input class="form-control" name="price" id="price">
</div>
<div class="form-group">
    <label for="description" class="col-form-label">Описание:</label>
    <textarea class="form-control" name="description" id="description" rows="3" maxlength="255"></textarea>
</div>
