@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('includes.sidebar')
        </div>
        <div class="col-md-8 py-4">
            <div class="card shadow-sm mb-2">
                <div class="card-header bg-light font-weight-light">Edit channel {{ $channel->title }}</div>

                <div class="card-body">
                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="POST">
                        @csrf
                        
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
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