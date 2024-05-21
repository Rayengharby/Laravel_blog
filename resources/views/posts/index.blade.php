@extends('layouts.app')

@section('content')
<div class="px-3 py-4">
    <a href="{{ Route('posts.create') }}" class="btn btn-warning"> ADD New Post</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ substr($post->title, 0, 40).'...' }}</td>
            <td>{{ substr($post->content, 0, 60).'...' }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Post Actions">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mx-1">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('Delete Post ?')" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
