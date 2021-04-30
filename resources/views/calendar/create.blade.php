@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Create an event for your group</h1>
</div>
<div class="emp-profile mt-0">
    <form method="post" action="/calendar" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="">Event Title</label>
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
            <label for="start" class="">Event start</label>
            <input id="start"
                    type="datetime-local"
                    class="form-control @error('start') is-invalid @enderror"
                    name="start"
                    value="{{ old('start') }}"
                    autocomplete="start" autofocus>
            @error('start')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="end" class="">Event end</label>
            <input id="end"
                    type="datetime-local"
                    class="form-control @error('end') is-invalid @enderror"
                    name="end"
                    value="{{ old('end') }}"
                    autocomplete="end" autofocus>
            @error('end')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <input id="user_id"
                    type="hidden"
                    class="form-control @error('user_id') is-invalid @enderror"
                    name="user_id"
                    value="{{ 0 }}"
                    autocomplete="user_id" autofocus>
            @error('user_id')
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
