@extends('layouts.adm')

@section('title','manufacturers page')

@section('content')
    <h1>{{ __('messages.man_page') }}</h1>
    <form action="{{route('adm.manufacturers.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="{{ __('messages.search') }}" aria-label="manufacturername" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">{{ __('messages.search') }}</button>
        </div>
    </form>
    <a class="btn btn-primary mb-2" href="{{route('adm.manufacturers.create')}}">{{ __('messages.create_man') }}</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.name') }}</th>
            <th scope="col">{{ __('messages.code') }}</th>
            <th>{{ __('messages.edit') }}</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($manufacturers); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$manufacturers[$i]->name}}</td>
                    <td>{{$manufacturers[$i]->code}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('adm.manufacturers.edit', $manufacturers[$i]->id)}}">{{ __('messages.edit') }}</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('adm.manufacturers.destroy', $manufacturers[$i]->id)}}">
                            @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
      </table>
@endsection
