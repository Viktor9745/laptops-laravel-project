@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('laptops.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter name">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="priceInput">Цена</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder="Enter price">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ramInput">ОЗУ</label>
                        <input type="number" class="form-control @error('ram') is-invalid @enderror" id="ramInput" name="ram" placeholder="Enter ram">
                        @error('ram')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="memoryInput">Память</label>
                        <input type="number" class="form-control @error('memory') is-invalid @enderror" id="memoryInput" name="memory" placeholder="Enter memory">
                        @error('memory')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpuInput">Процессор</label>
                        <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpuInput" name="cpu" placeholder="Enter cpu">
                        @error('cpu')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Изображение</label>
                        <input type="text" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="image URL">
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">Категория</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
