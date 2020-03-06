@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Who</th>
                        <th scope="col">Action</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($logs as $log)

                        <tr>
                            <th scope="row">{{$log->PRI}}</th>
                            <td><a href="/users/{{ $log->user->PRI }}/logs">{{$log->user->email}}</a></td>
                            <td>{{$log->Action}}</td>
                            <td>{{ $log->loggable_type }}</td>
                            <td>{{$log->updated_at->diffForHumans()}}</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                {{ $logs->links() }}
            </div>
        </div>
    </div>
@endsection
