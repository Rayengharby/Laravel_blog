<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navigation');
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>