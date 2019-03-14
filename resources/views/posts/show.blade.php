@extends('layouts.app')
@section ('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
<div class="container">
        <div>
            <label>Title: </label>
            <label>{{$post->title}}</label>
        </div>
        <div>
            <label>Description: </label>
            <label>{{$post->description}}</label>
        </div>
        <div>
            <label>Created at: </label>
            <label>{{$post->created_at}}</label>
        </div>
        <div>
            <label>Slug: </label>
            <label>{{$post->slug}}</label>
        </div>        
</div>
@endsection