@extends('layouts.app')
@section('content')
<div class="container text-center"> <h1> Add New Post </h1></div>
<form action="{{ route('posts.store') }}" method="post">

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="Write The Title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Write The Content"></textarea>
    </div>


    <label for="user" class="form-label">Users</label>
    <select class="form-select" id="user" aria-label="Default select example">
        <option selected>Select The User</option>
        @foreach ($Users as $User)
        <option value="{{ $User->id }}">{{ $User->name }}</option>
        @endforeach
    </select>


    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" aria-label="Default select example">
        <option selected>Select The category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>


    <div class="mb-3">
        <label class="form-label" for="image">Image</label>
        <input class="form-control" type="file" id="image"> 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
