@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Edit Post</h1>
            <a class="btn btn-success" href="{{route('posts')}}">All Posts</a>
        </div>
      </div>
    </div>
    <div class="row">
        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
        @endif
        <div class="col">
            <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" encrypt="mulipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="text" name="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Content</label>
                  <textarea class="form-control" name="content" rows="3">
                    {{$post->content}}
                  </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo</label>
                    <input type="file" name="photo" class="form-control">
                  </div>
                <div class="form-group">
                  <button class="btn btn-danger" type="submit">Update</button>
                </div>
              </form>
        </div>
      </div>
  </div>
  @endsection
