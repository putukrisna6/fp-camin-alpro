@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Post a note to your group</h1>
</div>
<div class="emp-profile mt-0">
    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="">Post Title</label>
            <input id="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') }}"
                    autocomplete="title" autofocus>
            @error('title')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="">Post Description</label>
            <input id="description"
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') }}"
                    autocomplete="description" autofocus>
            @error('description')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <input id="group_id"
                    type="hidden"
                    class="form-control @error('group_id') is-invalid @enderror"
                    name="group_id"
                    value="{{ $group_id }}"
                    autocomplete="group_id" autofocus>
            @error('group_id')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <button class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
