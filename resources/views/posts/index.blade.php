
  @extends('layouts.app')
  @section('content')
  <div class="px-3 py-4 ">
    <a href="{{ Route('posts.create') }}" class=" btn btn-success"> ADD New Post</a>
    {{-- or
    <a href="{{ url('posts/create') }}" class=" btn btn-success"> ADD New Post</a> --}}
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
      <td>{{ substr ($post->title, 1, 40).'...' }}</td>
      <td>{{ substr ($post ->content, 1, 60).'...' }}</td>
      <td>{{ $post->category->name}}</td>
      <td>
        <a href="{{ Route('posts.show',$post->id) }}"class="btn btn-info"> Show </a>
        <button class="btn btn-success"> Edit  </button>
        <button class="btn btn-danger"> DElete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
