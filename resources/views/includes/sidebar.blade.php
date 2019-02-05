<div id="sidebar">
    <div class="py-4">
        <a href="{{ route('discussion.create') }}" class="form-control btn btn-primary mb-2">Start New Discussion</a>
        <div class="card shadow-sm mb-2">
            <div class="card-header bg-light font-weight-light">
                Explore
            </div>
            <ul class="list-group list-group-flush channel-sidebar">
                <li class="list-group-item">
                    <a href="{{ route('forum') }}">Forum</a>
                </li>
                @auth
                    <li class="list-group-item">
                        <a href="/forum?filter=my-discussions">My Discussions</a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="card shadow-sm">
            <div class="card-header bg-light font-weight-light">
                Browse channels
            </div>
            <ul class="list-group list-group-flush channel-sidebar">
                @foreach ($channels as $channel)
                    <li class="list-group-item">
                        <a href="{{ route('channel', ['slug' => $channel->slug]) }}">{{ $channel->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>