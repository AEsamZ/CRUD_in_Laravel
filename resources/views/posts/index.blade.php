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
      <td><a href="/posts/{{$post->id}}/edit">Edit</a> OR <a type="button"  row_id="{{$post->id}}" data-toggle="modal" data-target="#exampleModal" id="delete_toggle">Delete</a> OR <a href="/posts/{{$post->id}}">View</a></td>
    </tr>
    @endforeach
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Post? Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <form id="form_delete" method="POST" action="{{route('posts.destroy',$post->id)}}" >
                            @csrf
                            @method('DELETE')

                            <button type="submit"  id="delete_item" type="button" class="btn btn-primary">Yes</button>
                        </form>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    </div>
                </div>
            </div>
        </div>

        </tbody>
    </table>
@endsection