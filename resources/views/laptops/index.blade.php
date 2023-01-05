@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($allLaptops as $oneLaptop)
                <div class="col-12">
                    <div class="card text-center" style="width: 18rem;">
                        <div class='shadow-lg'>
                            <img class="card-img-top" alt="laptop" style="height:100px, width:auto" src="{{$oneLaptop->image}}">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p><span style="font-family: Arial">Название: </span>{{$oneLaptop->name}}</p>
                                <p><span style="font-family: Arial">Цена: </span>{{$oneLaptop->price}} KZT</p>
                                <div class="col-12 col-md-6 mx-auto">
                                    <a href="{{route('laptops.show', $oneLaptop->id)}}" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
