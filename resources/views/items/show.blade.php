@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
<div class="col-md-9">
    <main class="py-4">
<script src="/app.js"></script>
<div class="row justify-content-center">
    <div class="col-md-10">
        <img alt="item" style="width:700px" src="/images/{{$item->image}}">
        <h3><span style="font-weight: bold">{{ __('messages.name') }}: </span>{{$item->name}}</h3>
        <h3><span style="font-weight: bold">{{ __('messages.price') }}: </span>{{$item->price}} KZT</h3>
        <h3><span style="font-weight: bold">{{ __('messages.ram') }}: </span>{{$item->ram}} GB</h3>
        <h3><span style="font-weight: bold">{{ __('messages.memory') }}: </span>{{$item->memory}} GB</h3>
        <h3><span style="font-weight: bold">CPU: </span>{{$item->cpu}}</h3>
        <h3><span style="font-weight: bold">GPU: </span>{{$item->gpu}}</h3>
        @can('update', $item)
        <a class="btn btn-success mb-2" href="{{route('items.edit', $item->id)}}">EDIT</a>
        @endcan
        <form action="{{route('reviews.store')}}", method="post">
            @csrf
            <div class="form-group">
                <label for="ReviewInput"><h3>{{ __('messages.leave_review') }}:</h3></label>
                <textarea class="form-control" id="ReviewInput" name="content" rows="3"></textarea>
                <input name="item_id" value="{{$item->id}}" type="hidden">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary" type="submit">{{ __('messages.submit') }}</button>
            </div>
        </form><br><br>

        @auth
        <form action="{{route('items.addcart', $item->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="quantityInput">{{ __('messages.quantity') }}</label>
                @isset($itemCart->pivot->quantity)
                <input min="0" type="number" class="form-control" id="quantitytInput" name="quantity" value="{{$itemCart->pivot->quantity}}">
                @else
                <input min="0" type="number" class="form-control" id="quantitytInput" name="quantity" value="0">
                @endisset
            </div>
            <div class="form-group">
                <label for="ramInput">{{ __('messages.ram') }}</label>
                <select class="form-select" name="ram">
                    @for($i=4;$i<=16;$i*=2)
                    @isset($itemCart->pivot->ram)
                        <option value="{{$i}}" {{$itemCart->pivot->ram == $i ? 'selected' : ''}}>
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
                <label for="memoryInput">{{ __('messages.memory') }}</label>
                <select class="form-select" name="memory">
                    @for($i=128;$i<=1024;$i*=2)
                    @isset($itemCart->pivot->quantity)
                        <option value="{{$i}}" {{$itemCart->pivot->memory == $i ? 'selected' : ''}}>
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
            <button style="float:left; margin-right:10px;" class="btn btn-success mt-2" type="submit">{{ __('messages.add_to_cart') }}</button>
        </form>


        @endauth
        <div style="margin-top:60px;">
        <hr>
        </div>
        <h3 class='text-center'>{{ __('messages.reviews') }}</h3>
        @foreach($item->reviews as $review)
            <div class="card mb-3">
                <div class="card-header">
                    {{$review->user->name}} <small>{{$review->created_at}}</small>
                </div>
                <div class="card-body">
                  <h4 class="card-text">{{$review->content}}</h4>
                  @can('update',$review)
                <div class="form-group">
                    <button class="btn btn-primary mt-3"  onclick="myFunction()">{{ __('messages.edit_review') }}</button>
                </div>
                @endcan
                <div id="myDIV" style="display:none;">
                    <form action="{{route('reviews.update', $review->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea  class="form-control mt-3" id="reviewInput" name="content" rows="3">{{$review->content}}</textarea>
                            <input name="item_id" value="{{$item->id}}" type="hidden">
                                @method('PUT')
                                <button style="float:right;" class="btn btn-success mt-2" type="submit" >{{ __('messages.save') }}</button>
                        </div>
                    </form>
                    <button style="float:right;margin-right:10px;" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ __('messages.delete') }}</button>
                </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post" action="{{route('reviews.destroy', $review->id)}}">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('messages.confirm_delete') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('messages.are_you_sure') }}
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
              @endforeach
    </div>
    </div>
</main>
</div>
@endsection
