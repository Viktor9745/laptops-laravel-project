@extends('layouts.adm')

@section('title','Manufacturers page')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{route('adm.manufacturers.update',$manufacturer->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nameInput">{{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"  value="{{$manufacturer->name}}">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="codeInput">{{ __('messages.code') }}</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="codeInput" name="code"  value="{{$manufacturer->code}}">
                    @error('code')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            <div class="form-group mt-3">
                <button type="submit" style="float:right;" class="btn btn-success">{{ __('messages.save') }}</button>
            </div>
        </form>
@endsection
