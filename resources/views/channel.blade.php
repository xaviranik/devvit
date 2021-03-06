@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar')
            </div>
    
            <div class="col-md-9">
                <div id="main" class="py-4">
                    @if ($discussions->count() > 0)
                        @foreach ($discussions as $discussion)
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
                                        {{ str_limit($discussion->content, 400, '...') }}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-around">
                                        <div class="comment">
                                            <span class="signs"><i class="far fa-comment-dots"></i> {{ $discussion->replies->count() }}</span>
                                        </div>
                                         
                                        <div class="share">
                                            <span class="signs"><i class="far fa-share-square"></i> Share</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <div class="light-body">
                                    No discussions on '{{ $channel }}'.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="text-center my-4">
                    {{ $discussions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
