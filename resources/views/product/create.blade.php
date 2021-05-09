@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>
            product name: <input type="text" name="name" value="{{old('product_name')}}" />
        </label>
    </div>
    <br />
    <div>
        <label>
            product price: <input type="text" name="price" value="{{old('product_price')}}" />
        </label>
    </div>
    <br />
    <div class="image_uploader">
        <label>
            product image: <input type="file" name="image" value="{{old('product_image')}}" />
        </label>
        <div>
            <img style="max-width: 400px" src="https://via.placeholder.com/400x300" />
        </div>

    </div>
    <button type="submit">Submit</button>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

@section('inline_js')
@parent
<script>
    imageUploader('image_uploader')
</script>

@endsection