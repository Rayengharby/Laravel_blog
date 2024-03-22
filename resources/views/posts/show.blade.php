@extends('layouts.app')

@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ session::get('success') }}
</div>
@endif

    <div class="container py-4" style="width: 18rem;">
        <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
        <div class="card-body">
            <h5 class="card-title">
                {{ $post->title }}
                <h5 class="card-title">{{ substr($post->category->name , 1 ,20).'...' }}</h5>
            </h5>
          <p class="card-text">Author: {{ substr($post->user->name,1,15).'...' }}</p>
          <p class="card-text"> {{ substr($post->content,1,10).'...' }}</p>
          <p class="card-text">
             <small class ="text-body-secondary">
                {{ $post->created_at }}
             </small>
            </p>
          {{-- <a href="#" class="btn btn-primary">{{ $post->content }}</a> --}}
        </div>
    </div>
 @endsection