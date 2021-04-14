@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2">Edit your profile info</h1>
</div>
<div class="emp-profile mt-0">
    <form method="post" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="phone" class="">Phone</label>
            <input id="phone"
                    type="text"
                    class="form-control @error('phone') is-invalid @enderror"
                    name="phone"
                    value="{{ old('phone') ?? $user->profile->phone}}"
                    autocomplete="phone" autofocus>
            @error('phone')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="profession" class="">Profession</label>
            <input id="profession"
                    type="text"
                    class="form-control @error('profession') is-invalid @enderror"
                    name="profession"
                    value="{{ old('profession') ?? $user->profile->profession}}"
                    autocomplete="profession" autofocus>
            @error('profession')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="location" class="">Location</label>
            <input id="location"
                    type="text"
                    class="form-control @error('location') is-invalid @enderror"
                    name="location"
                    value="{{ old('location') ?? $user->profile->location}}"
                    autocomplete="location" autofocus>
            @error('location')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="education" class="">Education</label>
            <input id="education"
                    type="text"
                    class="form-control @error('education') is-invalid @enderror"
                    name="education"
                    value="{{ old('education') ?? $user->profile->education}}"
                    autocomplete="education" autofocus>
            @error('education')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="expertise">Expertise</label>
            <select class="form-control @error('expertise') is-invalid @enderror"
                    id="expertise"
                    name="expertise">
              <option value="Beginner">Beginner</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Advanced">Advanced</option>
            </select>
        </div>

        <button class="btn btn-primary">Save</button>

    </form>
</div>
@endsection