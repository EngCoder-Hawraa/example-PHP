@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male','Female'];
    $provinceArray = ['Baghdad','Kirkuk','Mosul','Diyala','Wasit','Basrah'];
@endphp


<div class="container" style="padding-top:3%">
    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach
    @endif
    <form method="POST" action="{{route('profile.update')}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Facebook</label>
          <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Gender</label>
          <select class="form-control" name="gender">
              @foreach ($genderArray as $item)
              <option value="{{$item}}" {{($user->profile->gender == $item) ? $item:''}}>{{$item}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Province</label>
            <select class="form-control" name="province">
                @foreach ($provinceArray as $item)
                <option value="{{$item}}" {{($user->profile->province == $item) ? $item:''}}>{{$item}}</option>
                @endforeach
            </select>
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio</label>
          <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">
            {!! $user->profile->bio !!}
          </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Confirm password</label>
            <input type="password" name="c_password" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
</div>

@endsection
