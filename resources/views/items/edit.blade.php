@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
            <form action="{{route('items.update',$item->id)}}", method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group">
                            <label for="nameInput">{{ __('messages.name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"  value="{{$item->name}}">
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="priceInput">{{ __('messages.price') }}</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price"  value="{{$item->price}}">
                                @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ramInput">{{ __('messages.ram') }}</label>
                                <input type="number" class="form-control @error('ram') is-invalid @enderror" id="ramInput" name="ram"  value="{{$item->ram}}">
                                @error('ram')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="memoryInput">{{ __('messages.memory') }}</label>
                                <input type="number" class="form-control @error('memory') is-invalid @enderror" id="memoryInput" name="memory"  value="{{$item->memory}}">
                                @error('memory')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cpuInput">CPU</label>
                                <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpuInput" name="cpu" value="{{$item->cpu}}">
                                @error('cpu')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gpuInput">GPU</label>
                                <input type="text" class="form-control @error('gpu') is-invalid @enderror" id="gpuInput" name="gpu" value="{{$item->gpu}}">
                                @error('gpu')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="manufacturerInput">{{ __('messages.manufacturer') }}</label>
                                <select class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturerInput" name="manufacturer_id">
                                    @foreach($manufacturers as $manufact)
                                    <option @if($manufact->id ==  $item->manufacturer->id) selected @endif value="{{$manufact->id}}">{{$manufact->name}}</option>
                                    @endforeach
                                </select>
                                @error('manufacturer_id')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imageInput">{{ __('messages.image') }}</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="image">
                                <img alt="item" style="width:300px" src="/images/{{$item->image}}">
                                @error('image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="categoryInput">{{ __('messages.category') }}</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id">
                                @foreach($categories as $cat)
                                <option @if($cat->id ==  $item->category->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" style="float:right;" class="btn btn-success">{{ __('messages.update') }}</button>
                        </div>
            </form>
            <button style="float:right;margin-right:10px;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ __('messages.delete') }}</button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <form method="post" action="{{route('items.destroy', $item->id)}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('messages.confirm_delete') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ __('messages.are_you_sure') }}?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.no') }}</button>
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{ __('messages.yes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
@endsection
