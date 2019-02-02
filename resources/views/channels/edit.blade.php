@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit channel {{ $channel->title }}</div>

                <div class="card-body">
                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="POST">
                        @csrf
                        
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">
                                Update Channel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection