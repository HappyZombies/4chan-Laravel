<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4chan - {{ $board->board_name }}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{  URL::asset('css/style.css') }}">

</head>
<body>
    <div class="container-fluid top">
        <nav class="board-nav">
                <span>
                    [
                       @foreach($boards as $board)
                            <a href="{{ URL::asset('/') }}board/{{ $board->board_url }}">{{ $board->board_url }}</a> /
                       @endforeach
                        <a href="{{ URL::asset('/') }}">Home</a> /
                    ]
                </span>
        </nav>
        <div class="banner">
            <img class="img-responsive center-block" id="bannerImg" src="{{ URL::asset('/') }}">
            <h2 class="text-center boardTitle">/{{ ($board->board_url) }}/ - {{ $board->board_name }}</h2>
        </div>
    </div>
    <!--Main-->
    <div class="container main">

        @yield('content')



    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{  URL::asset('js/main.js') }}"></script>
</html>