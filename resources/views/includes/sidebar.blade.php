<div id="sidebar">
    <div class="py-4">
        <a href="{{ route('discussion.create') }}" class="form-control btn btn-primary mb-2">Start New Discussion</a>
        <div class="card shadow-sm">
            <div class="card-header bg-light font-weight-light">
                Browse channels
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($channels as $channel)
                    <li class="list-group-item channel-sidebar">{{ $channel->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>