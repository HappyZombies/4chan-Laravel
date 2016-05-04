@extends('layout.boards')
@extends('layout.boards-menu')

@section('content')
    @if(!$threads->isEmpty())
        @foreach($threads as $thread)
            <section class="thread-container id-{{ $thread->id  }} clearfix">
                <hr>
                <span class="hideIcon"><img src="{{ URL::asset('img') }}/expand.png"></span>
                <div class="thread">
                    <div class="threadThumbnail">
                        <a class="threadImg-big" href="https://66.media.tumblr.com/0d5ed85f652a0dd357d66221a0cb04e7/tumblr_nyxrlsrDsI1s5f7v4o1_1280.gif">
                            <img class="threadImg" src="https://66.media.tumblr.com/0d5ed85f652a0dd357d66221a0cb04e7/tumblr_nyxrlsrDsI1s5f7v4o1_1280.gif" title="Click to enlarge image.">
                        </a>
                    </div>
                    <span id="thread-title">{{ $thread->title }}</span>
                    <span id="thread-author">{{ $thread->author }}</span>
                    <span id="thread-date">{{ $thread->created_at }}</span>
                    <span id="thread-id">No.{{ $thread->id }}</span>
                    <blockquote id="thread-message">{{ $thread->comment }}</blockquote>
                </div>
                <!--Begin Thread comments -->
            </section>
        @endforeach
        {!! $threads->render() !!}
    @else
        <p>There are no threads.</p>
    @endif
@endsection
