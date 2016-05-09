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
    <!--Submit new Thread forum -->
    <div class="text-center newThread" >
        [<span>Post a Reply</span>]
        <div id="newThread-form" style="display: none;">
            <form method="POST" autocomplete="off" enctype="multipart/form-data" action="/thread/{{ $board->id }}/new-comment/{{ $thread->id }}">
                <div class="form-group row">
                    <label for="author" class="col-sm-2 form-control-label text-left">Author</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" class="form-control form-control-sm" id="author" placeholder="Anonymous" maxlength="25" value="{{ old('body') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comment" class="col-sm-2 form-control-label text-left">Comment</label>
                    <div class="col-sm-10">
                        <textarea name="comment" class="form-control form-control-sm" id="comment" maxlength="2000" required="required">{{ old('body') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="file" class="col-sm-2 form-control-label text-left">File</label>
                    <div class="col-sm-10">
                        <input type="file" name="file" class="form-control-sm" id="file" maxlength="25" required="required">
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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
    @if(count($errors))
        <div class="errors container">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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