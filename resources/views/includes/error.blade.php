
@if ($errors->count() > 0)
<div class="mb-2">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
</div>
@endif

