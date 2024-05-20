@extends('layouts.app')
@section('content')
<div class="container text-center"> <h1> Add New Post </h1></div>
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    
@csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title" placeholder="Write The Title">
        @error('title')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('title') is-invalid @enderror" id="content " name="content" rows="3" placeholder="Write The Content"></textarea>
        @error('content')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <label for="user" class="form-label">Users</label>
    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" aria-label="Default select example">
        <option selected>Select The User</option>
        @foreach ($Users as $User)
        <option value="{{ $User->id }}"
             @if(old('user_id')== $User->id) selected ="selected" @endif>{{ $User->name }}</option>
        @endforeach
    </select>
        @error('user_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
  


    <label for="category" class="form-label">Category</label>
    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Default select example">
        <option selected>Select The category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if (old('category_id')== $category->id) selected="selected" @endif>{{ $category->name }}</option>
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
