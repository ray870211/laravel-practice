@extends('layouts.app')

@section('content')
<h1>product</h1>
<div>
    <a href="{{route('products.create')}}">Creat</a>
</div>
@foreach ($products as $product)
<div>
    <a href="{{route('products.show',['product'=>$product->id])}}">
        <img width="400" src="{{asset('storage/'.$product->image_url)}}" alt="">
        <br />
    </a>
</div>
<div>
    <a href="{{route('products.edit',['product'=> $product->id])}}">Edit</a>
</div>
<div>
    <form method="post" action="{{ route('products.destroy',['product'=>$product->id])}}">
        @csrf
        @method('delete')
        <button type="submit">delete</button>
    </form>
</div>

@endforeach
@endsection

@section('inline_js')
@parent
@endsection