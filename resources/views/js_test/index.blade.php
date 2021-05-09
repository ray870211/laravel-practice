@extends('layouts.app')

@section('content')
<h1> test javascript</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="pic">
                <form action="{{}}" enctype="multipart/form-data">
                    <input type="file">
                    <input type="submit">
                </form>
            </div>
        </div>
        <div class="col">
            <img src="" alt="">
        </div>
    </div>
</div>
@endsection
@section('inline_js')
@parent
<script>

</script>
@endsection