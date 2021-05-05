@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-0">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Report {{ $post->user->name }}'s Post</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <p class="mb-1 text-gray-800 ml-2">Please refrain from abusing the report function.</p>
</div>

<div class="emp-profile mt-0">
    <form method="post" action="/report" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="reason">Reason</label>
            <select class="form-control @error('reason') is-invalid @enderror"
                    id="reason"
                    name="reason">
              <option value="SA">Sexual Content</option>
              <option value="HA">Harrassment and Threats</option>
              <option value="SP">Spam or Misleading Content</option>
            </select>
        </div>

        <div class="form-group">
            <input id="post_id"
                    type="hidden"
                    class="form-control @error('post_id') is-invalid @enderror"
                    name="post_id"
                    value="{{ $post->id }}"
                    autocomplete="post_id" autofocus>
            @error('post_id')
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <button class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
