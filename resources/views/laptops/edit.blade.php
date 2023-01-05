@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{route('laptops.update',$laptop->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nameInput">Название</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"  value="{{$laptop->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="priceInput">Цена</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price"  value="{{$laptop->price}}">
                    @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ramInput">ОЗУ</label>
                    <input type="number" class="form-control @error('ram') is-invalid @enderror" id="ramInput" name="ram"  value="{{$laptop->ram}}">
                    @error('ram')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="memoryInput">Память</label>
                    <input type="number" class="form-control @error('memory') is-invalid @enderror" id="memoryInput" name="memory"  value="{{$laptop->memory}}">
                    @error('memory')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpuInput">Процессор</label>
                    <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpuInput" name="cpu" value="{{$laptop->cpu}}">
                    @error('cpu')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageInput">Изображение</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="image URL" value="{{$laptop->image}}">
                    <img alt="laptop" style="width:300px" src="{{$laptop->image}}">
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoryInput">Категория</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id">
                        @foreach($categories as $cat)
                            <option @if($cat->id ==  $laptop->category->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" style="float:right;" class="btn btn-success">Сохранить</button>
                </div>
            </form>

            <form method="post" action="{{route('laptops.destroy', $laptop->id)}}">
                @csrf
                @method('DELETE')
                <button style="float:right;margin-right:10px;" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
@endsection
