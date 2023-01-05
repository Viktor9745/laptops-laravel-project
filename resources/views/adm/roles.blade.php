@extends('layouts.adm')

@section('title','Roles page')

@section('content')
    <h1>ROLES PAGE</h1>
    <form action="{{route('adm.roles.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="rolename" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </form>
    <a class="btn btn-primary mb-2" href="{{route('adm.roles.create')}}">Create Role</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($roles); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$roles[$i]->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('adm.roles.edit', $roles[$i]->id)}}">EDIT</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('adm.roles.destroy', $roles[$i]->id)}}">
                            @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
      </table>
@endsection
