@section('menu')
    <nav class="board-nav">
                    <span>
                        [
                        @foreach($boards as $all_boards)
                            <a href="{{ URL::asset('/') }}board/{{ $all_boards->board_url }}">{{ $all_boards->board_url }}</a> /
                        @endforeach

                        <a href="{{ URL::asset('/') }}">Home</a> /
                        ]
                    </span>
    </nav>
@stop