@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        @include('partials.post-card')
        <h1 class="m-3">Comments:</h1>
            <div class="card bg-base-200 shadow-sm mt-2 p-5">
        <fieldset class="fieldset">
                <legend class="fieldset-legend">Add comment</legend>
                <textarea name="body" class="textarea h-36 w-full @error('body')textarea-error @enderror"
                    placeholder="Post comment here">{{ old('body') }}</textarea>
                @error('body')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            <button class="btn btn-primary">Create</button>
            </fieldset>
            </div>
        @foreach ($post->comments as $comment)
            <div class="card bg-base-200 shadow-sm mt-2">
                <div class="card-body">
                    <p>{{ $comment->body }}</p>
                    <span class="text-base-content/50">{{ $comment->user->name }}</span>
                    <span class="text-base-content/50">{{ $comment->created_at->diffForHumans() }}</span>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
