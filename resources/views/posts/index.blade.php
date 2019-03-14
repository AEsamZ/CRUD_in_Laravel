@extends('layouts.app')
@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success">Add New Post</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Slugged Title</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>{{ isset($post->slug) ? $post->slug : 'Not Found'}}</td>
      <td><a href="/posts/{{$post->id}}/edit">Edit</a> OR <a href="/posts/{{$post->id}}">View</a> OR 
      <form action="{{route('posts.destroy', [$post->id])}}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Delete post? Are you sure?')" type="submit">Delete</button>
            </form>
    </td>
    </tr>
    @endforeach
    
    {{ $posts->links() }}
@endsection