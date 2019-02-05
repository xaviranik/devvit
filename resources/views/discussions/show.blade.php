@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar')
            </div>
    
            <div class="col-md-9">
                <div id="main" class="py-4">
                    {{-- Main discussion --}}
                    <div class="card shadow-sm mb-2">
                        <div class="card-header bg-light font-weight-light">
                            <div class="discussion-header">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-12">
                                        <img class="mb-2" src="{{ $discussion->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;
                                        <span class="info">{{ $discussion->user->name }}</span>&nbsp;&nbsp;
                                        <span class="info"><a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}"><i class="fas fa-link"></i> {{ $discussion->channel->title }}</a></span>&nbsp;&nbsp;
                                        <span class="info"><i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}</span>

                                        @if ($discussion->user_id == Auth::id())
                                            <div class="dropleft float-right">
                                                <span class="info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <span class="title"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}">{{ $discussion->title }}</a></span>&nbsp;&nbsp;
                                        
                                        @if ($best_answer)
                                            <span class="info text-success"><i class="fas fa-check-circle"></i> Solved</butspanton>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="discussion-body light-body">{!! Markdown::convertToHtml($discussion->content) !!}</div>

                            {{-- Best answer --}}
                            @if ($best_answer)
                                <hr>
                                <div class="card shadow-sm mb-2 pb-4">
                                    <div class="card-header bg-primary text-light font-weight-light">
                                        <i class="far fa-star"></i> Best Answer <span class="info text-light">(Marked by the discussion creator)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-12">
                                                <div class="float-left">
                                                    <img class="mb-2" src="{{ $best_answer->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;
                                                    <span class="info">{{ $best_answer->user->name }}</span>&nbsp;&nbsp;
                                                    <span class="info"><i class="far fa-clock"></i> {{ $best_answer->created_at->diffForHumans() }}</span>
                                                </div>
                                                @if ($best_answer->user_id == Auth::id())
                                                    <div class="dropleft float-right">
                                                        <span class="info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </span>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <span class="light-body">{{ $best_answer->content }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Footer --}}
                        <div class="card-footer">
                            <div class="d-flex justify-content-around">
                                <div class="comment">
                                    <div class="signs">
                                        <span><i class="far fa-comment-dots"></i> {{ $discussion->replies->count() }}</span>
                                    </div>
                                </div>
                                <div class="share">
                                    <div class="signs">
                                        <span><i class="far fa-share-square"></i> Share</span>
                                    </div>
                                </div>
                                <div class="watch">
                                    @if ($discussion->is_being_watched_by_auth_user())
                                        <div class="signs">
                                            <a class="text-primary" href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}"><span><i class="fas fa-eye"></i> Watching</span></a>
                                        </div>
                                    @else
                                        <div class="signs">
                                            <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}"><span><i class="far fa-eye"></i> Watch</span></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Replies --}}

                    @if (Auth::check())
                        <div class="card shadow-sm card-body mb-2">
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
                    @else
                        <div class="card shadow-sm mb-2">
                            <div class="card-body text-center">
                                <span class="light-body"><a href="{{ route('login') }}">Login</a> to leave a reply...</span>
                            </div>
                        
                        </div>
                    @endif

                    @if ($discussion->replies->count() > 0)

                        <hr>
                        
                        @foreach ($discussion->replies->reverse() as $reply)
                            <div class="card shadow-sm mb-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-12">
                                            <div class="float-left">
                                                <img class="mb-2" src="{{ $reply->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;
                                                <span class="info">{{ $reply->user->name }}</span>&nbsp;&nbsp;
                                                <span class="info"><i class="far fa-clock"></i> {{ $reply->created_at->diffForHumans() }}</span>
                                            </div>
                                            @if ($reply->user_id == Auth::id())
                                                <div class="dropleft float-right">
                                                    <span class="info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </span>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                        
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <span class="light-body">{!! Markdown::convertToHtml($reply->content) !!}</a></span>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="card-footer">
                                    <div class="d-flex justify-content-around">
                                        @if ($reply->is_liked_by_auth_user())
                                            <div class="unlike">
                                                <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="signs text-primary"><i class="fas fa-thumbs-up"></i></a>
                                                <span class="signs text-primary">{{ $reply->likes->count() }}</span>
                                            </div>
                                        @else
                                            <div class="like">
                                                <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="signs"><i class="far fa-thumbs-up"></i></a>
                                                <span class="signs">{{ $reply->likes->count() }}</span>
                                            </div>
                                        @endif
                                        
                                        @if (!$best_answer && $discussion->user_id == Auth::id())
                                            <div class="best-reply">
                                                <a class="signs" href="{{ route('reply.best.answer', ['id' => $reply->id]) }}"><i class="far fa-star"></i></a>
                                                <span class="signs">Mark As Best Answer</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection