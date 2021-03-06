@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Posts</h1>
            <a class="btn btn-success" href="{{route('post.create')}}">Create Post</a>
        </div>
      </div>
    </div>
    <div class="row">
       @if ($posts->count() > 0)
       <div class="col">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        {{-- <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-thumbnail" width="100" height="100"> --}}
                        <img src="{{$item->photo}}" alt="{{$item->photo}}" class="img-thumbnail" width="100" height="100">
                    </td>
                    <td>
                        <a href="{{route('post.edit',['id',$item->id])}}"><i class="fas fa-2x fa-edit"></i></a>
                        <a href="{{route('post.destroy',['id'=>$item->id])}}"><i class="fas fa-2x fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
       @else
       <div class="col">
        <div class="alert alert-danger" role="alert">
            No Posts
        </div>
       </div>
       @endif

    </div>
  </div>
  @endsection
