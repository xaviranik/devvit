@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar')
            </div>
    
            <div class="col-md-9">
                <div id="main" class="py-4">
                    
                    @include('includes.error')

                    <div class="card shadow-sm">
                        <div class="card-header bg-light font-weight-light">
                            Profile
                            <h3>{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <input class="form-control" type="text" name="university" value="{{ $profile->university }}" placeholder="University">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input class="form-control" type="text" name="website" value="{{ $profile->website }}" placeholder="Website">
                                </div>
                                <div class="form-group">
                                    <label for="Bio">Bio</label>
                                    <textarea placeholder="Tell something about yourself..." class="form-control" name="description" id="content" cols="30" rows="10">{{ $profile->profile_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Save Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
