<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>/{{ $board->board_url }}/ - {{ $board->board_name }} - 4chan</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" >
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{  URL::asset('css/style.css') }}">

</head>
<body>
    <div class="container-fluid top">
            @yield('menu')
        <div class="banner">
            <img class="img-responsive center-block" id="bannerImg" src="{{ URL::asset('/') }}">
            <h2 class="text-center boardTitle">/{{ $board->board_url }}/ - {{ $board->board_name }}</h2>
        </div>
    </div>
    <!--Second banner header/ information header-->
    <div class="container">
        <hr>
        <div class="ad center-block">
            <p>Please support 4chan by disabling your ad blocker on *.4chan.org/*, purchasing a self-serve ad, or buying a 4chan Pass.</p>
        </div>
        <hr>
        <div class="text-center newThread" >
            [<span>Start a New Thread</span>]
            <div id="newThread-form" style="display: none;">
                <form method="POST" autocomplete="off" enctype="multipart/form-data" action="/thread/new/{{ $board->id }}">
                   <div class="form-group row">
                        <label for="thread-author" class="col-sm-2 form-control-label text-left">Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="thread-author" class="form-control form-control-sm" id="thread-author" placeholder="Anonymous" maxlength="25">
                        </div>
                   </div>

                    <div class="form-group row">
                        <label for="thread-title" class="col-sm-2 form-control-label text-left">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="thread-title" class="form-control form-control-sm" id="thread-title" maxlength="25">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thread-comment" class="col-sm-2 form-control-label text-left">Comment</label>
                        <div class="col-sm-10">
                            <textarea name="thread-comment" class="form-control form-control-sm" id="thread-comment" maxlength="2000" required="required"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thread-file" class="col-sm-2 form-control-label text-left">File</label>
                        <div class="col-sm-10">
                            <input type="file" name="thread-file" class="form-control-sm" id="thread-file" maxlength="25" required="required">
                        </div>
                    </div>
                    <div class="form-group row pull-left">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-secondary">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="container-fluid">
    <hr>
        @yield('content')


    @yield('menu')
    <div class="legal text-center">
        <small>All trademarks and copyrights on this page are owned by their respective parties. Images uploaded are the responsibility of the Poster. Comments are owned by the Poster.</small>
    </div>
    </div>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{  URL::asset('js/main.js') }}"></script>
</html>