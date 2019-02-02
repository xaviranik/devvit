@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar')
            </div>
    
            <div class="col-md-9">
                <div id="main" class="py-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light font-weight-light">
                            Create a discussion
                        </div>
                        <div class="card-body">
                            <form action="{{ route('discussion.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="channel_id" id="channel_id">
                                        <option value="" disabled selected value>Select a channel...</option>
                                        @foreach ($channels as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="title" placeholder="Give a title...">
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Ask a question..." class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Create Discussion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
