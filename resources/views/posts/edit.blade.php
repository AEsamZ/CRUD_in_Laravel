@extends('layouts.app')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    <form action="{{route('posts.update',$post->id)}}" method="POST">        
        @csrf        
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="{{@$post->title}}" aria-describedby="emailHelp" placeholder="Enter email" name="title">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{@$post->description}}</textarea>
        </div>
        <select class="form-control" name="user_id">
               @foreach($users as $user)
                   <option value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
           </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection