@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2">Edit your group's info</h1>
</div>
<div class="emp-profile mt-0">
    <form method="post" action="/groups/{{ $group->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name" class="">Name</label>
            <input id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') ?? $group->name}}"
                    autocomplete="name"
                    autofocus
                    required>
            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="">Description</label>
            <input id="description"
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') ?? $group->description}}"
                    autocomplete="description"
                    autofocus
                    required>
            @error('description')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="industry">Industry</label>
            <select class="form-control @error('industry') is-invalid @enderror"
                    id="industry"
                    name="industry">
              <option value="Tech">Tech</option>
              <option value="Banking">Banking</option>
              <option value="Healthcare">Healthcare</option>
              <option value="Education">Education</option>
            </select>
        </div>

        <div class="form-group">
            <label for="visibility">Visibility</label>
            <select class="form-control @error('visibility') is-invalid @enderror"
                    id="visibility"
                    name="visibility">
              <option value="Public">Public</option>
              <option value="Private">Private</option>
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
