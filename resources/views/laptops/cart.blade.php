@extends('layouts.app')

@section('title', 'CART')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Наименование</th>
        <th scope="col">Картинка</th>
        <th scope="col">Количество</th>
        <th scope="col">ОЗУ</th>
        <th scope="col">Память</th>
        <th scope="col">Цена</th>
        <th>Обновить</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
        @for($i=0;$i<count($laptopCart); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$laptopCart[$i]->name}}</td>
                <td><img class="card-img-top" alt="laptop" style="height:100px; width:auto" src="{{$laptopCart[$i]->image}}"></td>
                <td>{{$laptopCart[$i]->pivot->quantity}}</td>
                <td>{{$laptopCart[$i]->pivot->ram}}</td>
                <td>{{$laptopCart[$i]->pivot->memory}}</td>
                <td>{{($laptopCart[$i]->pivot->quantity)*($laptopCart[$i]->price)}} KZT</td>
                <td>
                    <a class="btn btn-success" href="{{route('laptops.show', $laptopCart[$i])}}">Обновить</a>
                </td>
                <td>
                    <form action="{{route('laptops.uncart', $laptopCart[$i])}}" method="post">
                        @csrf
                        <button style="float:left;" class="btn btn-danger" type="submit">Удалить из корзины</button>
                    </form>
                </td>
            </tr>
        @endfor
    </tbody>
  </table>
@endsection
