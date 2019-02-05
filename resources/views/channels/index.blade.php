@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('includes.sidebar')
        </div>
        <div class="col-md-9 py-4">
            <div class="card shadow-sm mb-2">
                <div class="card-header bg-light font-weight-light">
                    Manage Channels
                    <a href="{{ route('channels.create') }}" class="btn btn-primary float-right">Create New Channel</a>
                </div>
                

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
                                            <a class="btn btn-primary btn-sm mr-2" href="{{ route('channels.edit', ['channel' => $channel->id]) }}"><i class="far fa-edit"></i></a>
                                            <button class="btn btn-outline-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
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