@extends('product.layout')

@section('content')
<div class="jumbotron container">Trashed products</p>
    <a class="btn btn-primary btn-lg" href="{{ route('products.index')}}" role="button">Home</a>
  </div>
  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col" style="width:400px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($products as $item)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->price}} IQD</td>
            <td>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('product.back.from.trash',$item->id)}}">Back</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger" href="{{ route('product.delete.from.database',$item->id)}}">Delete</a>
                    </div>
                  </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {!! $products->links() !!}
  </div>
@endsection
