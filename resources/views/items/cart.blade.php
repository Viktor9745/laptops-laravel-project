@extends('layouts.app')

@section('title', 'CART')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('messages.name') }}</th>
        <th scope="col">{{ __('messages.image') }}</th>
        <th scope="col">{{ __('messages.quantity') }}</th>
        <th scope="col">{{ __('messages.ram') }}</th>
        <th scope="col">{{ __('messages.memory') }}</th>
        <th scope="col">{{ __('messages.price') }}</th>
        <th>{{ __('messages.update') }}</th>
        <th>{{ __('messages.delete') }}</th>
      </tr>
    </thead>
    <tbody>
        @for($i=0;$i<count($itemCart); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$itemCart[$i]->name}}</td>
                <td><img class="card-img-top" alt="item" style="height:100px; width:auto" src="/images/{{$itemCart[$i]->image}}"></td>
                <td>{{$itemCart[$i]->pivot->quantity}}</td>
                <td>{{$itemCart[$i]->pivot->ram}}</td>
                <td>{{$itemCart[$i]->pivot->memory}}</td>
                <td>{{($itemCart[$i]->pivot->quantity)*($itemCart[$i]->price)}} KZT</td>
                <td>
                    <a class="btn btn-success" href="{{route('items.show', $itemCart[$i])}}">{{ __('messages.update') }}</a>
                </td>
                <td>
                    <form action="{{route('items.uncart', $itemCart[$i])}}" method="post">
                        @csrf
                        <button style="float:left;" class="btn btn-danger" type="submit">{{ __('messages.delete_from_cart') }}</button>
                    </form>
                </td>
            </tr>
        @endfor
    </tbody>
  </table>
  {{-- <form action = "{{route('addmoney.paymentstripe')}}" method="get">
    @csrf --}}
    @if(count($itemCart)>0)
      <a class="btn btn-success" style="margin-left:1200px; width:100px" type="submit" href = "{{route('addmoney.paymentstripe')}}">{{ __('messages.buy_all') }}</a>
    @endif
  {{-- </form> --}}
@endsection
