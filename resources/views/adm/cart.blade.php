@extends('layouts.adm')

@section('title','Users page')

@section('content')
    <h1>{{ __('messages.cart_page') }}</h1>
    <form action="{{route('adm.users.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="{{ __('messages.search') }}" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">{{ __('messages.search') }}</button>
        </div>
    </form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.name') }}</th>
            <th scope="col">{{ __('messages.user') }}</th>
            <th scope="col">{{ __('messages.quantity') }}</th>
            <th>{{ __('messages.ram') }}</th>
            <th>{{ __('messages.memory') }}</th>
            <th>{{ __('messages.confirm_order') }}</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($itemsInCart); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$itemsInCart[$i]->item->name}}</td>
                    <td>{{$itemsInCart[$i]->user->name}}</td>
                    <td>{{$itemsInCart[$i]->quantity}}</td>
                    <td>{{$itemsInCart[$i]->ram}}</td>
                    <td>{{$itemsInCart[$i]->memory}}</td>
                    <td>{{$itemsInCart[$i]->in_cart}}</td>
                    <td>
                      <form action="{{route('adm.cart.confirm', $itemsInCart[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{ __('messages.confirm_order') }}</button>
                      </form>
                    </td>
                </tr>
            @endfor
        </tbody>
      </table>
@endsection
