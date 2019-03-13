@extends('layouts.app')
@section ('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
<form action="{{route('posts.index')}}" method="POST" >
<table>
    <tr>
         <th>Post details</th>
    </tr>
    <tr>
        <td>Title:</td>
        <td>{{$post->title}}</td>
    </tr>

    <tr>
        <td>Description:</td>
        <td>{{$post->description}}</td>
    </tr>

    <tr>
        <td>Created at:</td>
        <td>{{$post->created_at}}</td>
    </tr>


</table>
</form>
@endsection