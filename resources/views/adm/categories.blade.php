@extends('layouts.adm')

@section('title','categories page')

@section('content')
    <h1>CATEGORIES PAGE</h1>
    <form action="{{route('adm.categories.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="categoriename" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </form>
    <a class="btn btn-primary mb-2" href="{{route('adm.categories.create')}}">Create Category</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($categories); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$categories[$i]->name}}</td>
                    <td>{{$categories[$i]->code}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('adm.categories.edit', $categories[$i]->id)}}">EDIT</a>
                    <td>
                        <form method="post" action="{{route('adm.categories.destroy', $categories[$i]->id)}}">
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
