@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('includes.sidebar')
        </div>
        <div class="col-md-9 py-4">
            @include('includes.error')
            <div class="card shadow-sm mb-2">
                <div class="card-header bg-light font-weight-light">Create a new channel</div>

                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
                                Create Channel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection