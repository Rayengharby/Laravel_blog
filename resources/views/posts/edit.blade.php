@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1> Edit Post </h1>
    </div>

    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" name="title" id="title" placeholder="Write The Title">
            @error('title')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" placeholder="Write The Content">{{ $post->content }}</textarea>
            @error('content')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <label for="user_id" class="form-label">User</label>
        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" aria-label="Default select example">
            <option selected>Select The User</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if ($post->user_id == $author->id) selected @endif>{{ $author->name }}</option>
            @endforeach
        </select>
        @error('user_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <label for="category_id" class="form-label">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Default select example">
            <option selected>Select The Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
