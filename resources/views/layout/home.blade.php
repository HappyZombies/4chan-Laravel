<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4chan</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" >
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{  URL::asset('css/style.css') }}">

</head>
<body>
<div class="container">
    <a href="{{ URL::asset('/') }}"><img src="{{ URL::asset('img/cat.png') }}" class="img-responsive center-block" ></a>
    @yield('content')

    <!--Bottom Nav-->
    <div class="col-md-10 col-md-offset-1">
        <nav class="bottom-nav ">
            <ul>
                <li class="first"><a href="{{ URL::asset('/') }}">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="{{ URL::asset('/') }}rules">Rules</a></li>
                <li><a href="#">Support 4chan</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">日本語</a></li>
            </ul>
        </nav>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{  URL::asset('js/main.js') }}"></script>
</html>