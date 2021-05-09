<html>

<head>
    <title>商品頁面</title>
    @include('layouts.meta')
    @include('layouts.css')
</head>

<body>
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')

    @section('inline_js')
    @show
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
    </div>
</body>

</html>