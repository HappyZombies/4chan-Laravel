@extends('layout.boards')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        Showing individual board
                        <li>
                            <ul>
                                    {{ $board->board_name }}
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
