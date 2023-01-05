@extends('layouts.adm')

@section('title','Users page')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{route('adm.users.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="roleInput">ROLE</label>
                <select class="form-control @error('role_id') is-invalid @enderror" id="roleInput" name="role_id">
                    @foreach($roles as $role)
                    <option @if($role->id ==  $user->role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" style="float:right;" class="btn btn-success">Edit User</button>
            </div>
        </form>
@endsection
