@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th style="width: 60%">Name</th>
                            <th style="width: 40%">Action</th>
                        </thead>

                        <tbody>
                            @foreach ($channels as $channel)
                                <tr>
                                    <td>{{ $channel->title }}</td>
                                    <td>
                                        <form class="form-inline" action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-outline-primary btn-sm mr-2" href="{{ route('channels.edit', ['channel' => $channel->id]) }}">Edit</a>
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection