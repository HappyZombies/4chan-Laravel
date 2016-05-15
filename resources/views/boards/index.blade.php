@extends('layout.boards')
@extends('layout.boards-menu')

@section('content')
    @if(!empty($board))
        <?php $threads = $board->threads()->orderBy('updated_at', 'desc')->paginate(5); ?>
        @foreach($threads as $thread)
            <section class="thread-container id-{{ $thread->id  }} clearfix">
                <hr>
                <span class="hideIcon"><img src="{{ URL::asset('img') }}/expand.png"></span>
                <div class="thread">
                    <div class="threadThumbnail">
                        <a class="threadImg-big" href="{{ URL::asset('/uploads/') }}/{{ $thread->file }}">
                            <img class="threadImg" src="{{ URL::asset('/uploads/') }}/{{ $thread->file }}" title="Click to enlarge image.">
                        </a>
                    </div>
                    <span id="thread-title">{{ $thread->title }}</span>
                    <span id="thread-author">{{ $thread->author }}</span>
                    <span id="thread-date">{{ $thread->created_at }}</span>
                    <span id="thread-id">No.{{ $thread->id }}</span>
                    <blockquote id="thread-message" class="comment">{!! nl2br(e($thread->comment)) !!}</blockquote>
                    <span class="summary"><a href="{{ URL::asset('/') }}board/{{ $board->board_url }}/thread/{{ $thread->id }}">Click here</a> to view thread.</span>
                    <!-- Begin comments-->
                    <div class = "reply-container">
                        @foreach($thread->comments()->orderBy('created_at', 'desc')->take(5)->get()->reverse() as $thread_comments)
                            <span  class="sideArrow">>>>&nbsp;</span>
                            <div class="reply">
                                <div class="comment-info">
                                    <span id="thread-author">{{ $thread_comments->author }}&nbsp;</span>
                                    <span><i>{{ $thread_comments->created_at }}</i>&nbsp;</span>
                                    <span>No.{{ $thread_comments->id }}&nbsp;</span>
                                </div>
                                @if(!empty($thread_comments->file))
                                    <div class="threadThumbnail commentThumbnail">

                                        <a class="threadImg-big" href="{{ URL::asset('/uploads/') }}/{{ $thread_comments->file }}">
                                            <img class="threadImg" src="{{ URL::asset('/uploads/') }}/{{ $thread_comments->file }}" title="Click to enlarge image.">
                                        </a>
                                    </div>
                                @endif
                                <blockquote  class="comment">{!! nl2br(e($thread_comments->comment)) !!}&nbsp;</blockquote>
                            </div>
                        @endforeach
                    </div>
                </div>

            </section>
        @endforeach
        <hr>
        {!! $threads->render() !!}
        <!-- board->threads()->render() would go here -->
    @else
        <p>There are no threads.</p>
    @endif
@endsection
