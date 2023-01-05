@extends('layouts.adm')

@section('title','Roles page')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{route('adm.roles.update',$role->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nameInput">NAME</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"  value="{{$role->name}}">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
            <div class="form-group mt-3">
                <button type="submit" style="float:right;" class="btn btn-success">Save</button>
            </div>
        </form>
@endsection
