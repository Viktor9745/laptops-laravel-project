@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
<div class="col-md-9">
        <main class="py-4">
            {{-- <div class="row row-cols-1 row-cols-md-3 g-4"> --}}
            <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                    <label for="nameInput">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="priceInput">{{ __('messages.price') }}</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder="Enter price">
                        @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ramInput">{{ __('messages.ram') }}</label>
                        <input type="number" class="form-control @error('ram') is-invalid @enderror" id="ramInput" name="ram" placeholder="Enter ram">
                        @error('ram')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="memoryInput">{{ __('messages.memory') }}</label>
                        <input type="number" class="form-control @error('memory') is-invalid @enderror" id="memoryInput" name="memory" placeholder="Enter memory">
                        @error('memory')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpuInput">CPU</label>
                        <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpuInput" name="cpu" placeholder="Enter cpu">
                        @error('cpu')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gpuInput">GPU</label>
                        <input type="text" class="form-control @error('gpu') is-invalid @enderror" id="gpuInput" name="gpu" placeholder="Enter gpu">
                        @error('gpu')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="manufacturerInput">{{ __('messages.manufacturer') }}</label>
                        <select class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturerInput" name="manufacturer_id">
                            @foreach($manufacturers as $manufact)
                            <option value="{{$manufact->id}}">{{$manufact->name}}</option>
                        @endforeach
                    </select>
                    @error('manufacturer_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                    </div>
                    <div class="form-group">
                        <label for="imageInput">{{ __('messages.image') }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="image">
                        @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">{{ __('messages.category') }}</label>
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
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.submit') }}</button>
                    </div>
            </form>
        </div>
        </main>
</div>
@endsection
