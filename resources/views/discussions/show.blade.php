@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar')
            </div>
    
            <div class="col-md-9">
                <div id="main" class="py-4">
                    <div class="card shadow-sm mb-2">
                        <div class="card-header bg-light font-weight-light">
                            <div class="discussion-header">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-12">
                                        <img class="mb-2" src="{{ $discussion->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;
                                        <span class="info">{{ $discussion->user->name }}</span>&nbsp;&nbsp;
                                        <span class="info"><i class="fas fa-link"></i> {{ $discussion->channel->title }}</span>&nbsp;&nbsp;
                                        <span class="info"><i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}</span>
                                    </div>
                    
                                    <div class="col-md-12">
                                        <span class="title"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}">{{ $discussion->title }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="discussion-body light-body">
                                {{ $discussion->content }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-around">
                                <div class="">
                                    <span class="signs"><i class="far fa-thumbs-up"></i> {{ $discussion->replies->count() }}</span>
                                </div>
                                <div class="">
                                    <span class="signs"><i class="far fa-comment-dots"></i> {{ $discussion->replies->count() }}</span>
                                </div>
                                
                                <div class="">
                                    <span class="signs"><i class="far fa-share-square"></i> Share</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Replies --}}

                    <div class="card card-body mb-2">
                        <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" id="content" placeholder="Leave a reply..." cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-reply"></i> Reply</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($discussion->replies->reverse() as $reply)
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-12">
                                        <img class="mb-2" src="{{ $discussion->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;
                                        <span class="info">{{ $discussion->user->name }}</span>&nbsp;&nbsp;
                                        <span class="info"><i class="far fa-clock"></i> {{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <span class="light-body">{{ $reply->content }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection