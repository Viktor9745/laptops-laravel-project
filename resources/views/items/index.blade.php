@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')
<div class="col-md-9">
<main class="py-4">
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($allItems as $oneItem)
                <div class="col-12">
                    <div class="card text-center" style="width: 18rem;">
                        <div class='shadow-lg'>
                            <img class="card-img-top" alt="item" style="height:100px, width:auto" src="/images/{{$oneItem->image}}">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p><span style="font-family: Arial">{{ __('messages.name') }}: </span>{{$oneItem->name}}</p>
                                <p><span style="font-family: Arial">{{ __('messages.price') }}: </span>{{$oneItem->price}} KZT</p>
                                <div class="col-12 col-md-6 mx-auto">
                                    <a href="{{route('items.show', $oneItem->id)}}" class="btn btn-primary">{{ __('messages.details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
</div>
</main>
</div>
@endsection
