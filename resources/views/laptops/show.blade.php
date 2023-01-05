@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
    <script src="/js.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img alt="laptop" style="width:700px" src="{{$laptop->image}}">
            <h3><span style="font-weight: bold">Название: </span>{{$laptop->name}}</h3>
            <h3><span style="font-weight: bold">Цена: </span>{{$laptop->price}} KZT</h3>
            <h3><span style="font-weight: bold">ОЗУ: </span>{{$laptop->ram}} GB</h3>
            <h3><span style="font-weight: bold">Память: </span>{{$laptop->memory}} GB</h3>
            <h3><span style="font-weight: bold">Процессор: </span>{{$laptop->cpu}}</h3>
            @can('update', $laptop)
            <a class="btn btn-success mb-2" href="{{route('laptops.edit', $laptop->id)}}">Редактировать</a>
            @endcan
            <form action="{{route('comments.store')}}", method="post">
                @csrf
                <div class="form-group">
                    <label for="commentInput"><h3>Оставить комментарий:</h3></label>
                    <textarea class="form-control" id="commentInput" name="content" rows="3"></textarea>
                    <input name="laptop_id" value="{{$laptop->id}}" type="hidden">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </div>
            </form><br><br>

            @auth
        <form action="{{route('laptops.addcart', $laptop->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="quantityInput">Количество</label>
                @isset($laptopCart->pivot->quantity)
                <input min="0" type="number" class="form-control" id="quantitytInput" name="quantity" value="{{$laptopCart->pivot->quantity}}">
                @else
                <input min="0" type="number" class="form-control" id="quantitytInput" name="quantity" value="0">
                @endisset
            </div>
            <div class="form-group">
                <label for="ramInput">ОЗУ</label>
                <select class="form-select" name="ram">
                    @for($i=4;$i<=16;$i*=2)
                    @isset($laptopCart->pivot->ram)
                        <option value="{{$i}}" {{$laptopCart->pivot->ram == $i ? 'selected' : ''}}>
                            {{$i}}
                        </option>
                    @else
                        <option value="{{$i}}">
                            {{$i}}
                        </option>
                    @endisset
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="memoryInput">Память</label>
                <select class="form-select" name="memory">
                    @for($i=128;$i<=1024;$i*=2)
                    @isset($laptopCart->pivot->quantity)
                        <option value="{{$i}}" {{$laptopCart->pivot->memory == $i ? 'selected' : ''}}>
                            {{$i}}
                        </option>
                    @else
                    <option value="{{$i}}">
                        {{$i}}
                    </option>
                    @endisset
                    @endfor
                </select>
            </div>
            <button style="float:left; margin-right:10px;" class="btn btn-success mt-2" type="submit">Add to cart</button>
        </form>


        @endauth
        <div style="margin-top:60px;">
        <hr>
        </div>
            <h3 class='text-center'>Комментарий</h3>
            @foreach($laptop->comments as $comment)
                <div class="card mb-3">
                    <div class="card-header">
                        {{$comment->user->name}} <small>{{$comment->created_at}}</small>
                    </div>
                    <div class="card-body">
                        <h4 class="card-text">{{$comment->content}}</h4>
                        @can('update',$comment)
                        <div class="form-group">
                            <button class="btn btn-primary mt-3"  onclick="myFunction()">Редактировать комментарии</button>
                        </div>
                        @endcan
                        <div id="myDIV" style="display:none;">
                            <form action="{{route('comments.update', $comment->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea  class="form-control mt-3" id="commentInput" name="content" rows="3">{{$comment->content}}</textarea>
                                    <input name="laptop_id" value="{{$laptop->id}}" type="hidden">
                                    @method('PUT')
                                    <button style="float:right;" class="btn btn-success mt-2" type="submit" >Сохранить</button>
                                </div>
                            </form>
                            <form method="post" action="{{route('comments.destroy', $comment->id)}}">
                                @csrf
                                @method('DELETE')
                                <button style="float:right;margin-right:10px;" class="btn btn-danger mt-2">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
