@extends('layout.base')

@section('content')
    <div class="container">

        <img src="{{ URL::asset('img/cat.png') }}" class="img-responsive center-block" >


        <div class="row">

            <!--Who is this 4chan ? -->
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default home-panel">
                    <div class="panel-heading red-panel"><h2>What is 4chan?</h2></div>

                    <div class="panel-body">
                       <p> 4chan is a simple image-based bulletin board where anyone can post comments and share images. There are boards dedicated to a variety of topics, from Japanese animation and culture to videogames, music, and photography. Users do not need to register an account before participating in the community. Feel free to click on a board below that interests you and jump right in!

                        Be sure to familiarize yourself with the <a href="rules">rules</a> before posting, and read the <a href="faq">FAQ</a> if you wish to learn more about how to use the site.
                       </p>
                    </div>
                </div>
            </div>
            <!--All boards -->
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default home-panel">
                    <div class="panel-heading board-panel"><h2>Boards</h2></div>

                    <div class="panel-body">
                        <ul>
                            @foreach($boards as $board)
                                <li><a href="{{ $board->board_url   }}">{{ $board->board_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--Here we would have most recent threads -->

            <!--Stat information -->
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default home-panel">
                    <div class="panel-heading board-panel"><h2>Stats</h2></div>

                    <div class="panel-body">
                            <ul class="row stats">

                                <div class="col-md-4">
                                    <li><strong>Total Posts:</strong> 666</li>
                                </div>

                                <div class="col-md-4">
                                    <li><strong>Current Users:</strong> 666</li>
                                </div>

                                <div class="col-md-4">
                                    <li><strong>Active Content:</strong> 666 GB</li>
                                </div>
                            </ul>
                    </div>
                </div>
            </div>

            <!--Bottom Nav-->
            <div class="col-md-10 col-md-offset-1">
                <nav class="bottom-nav ">
                    <ul>
                        <li class="first"><a href="#">Home</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Rules</a></li>
                        <li><a href="#">Support 4chan</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">日本語</a></li>
                    </ul>
                </nav>
            </div>

        </div>





    </div>
@endsection
