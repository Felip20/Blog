
@extends('layout')

@section('title')
    <title>{{$blog->title}}</title>
@endsection

@section('content')
    <h1>{{$blog->title}}</h1>
    <p>{{$blog->body}}</p>
    <a href="/">Back</a>
@endsection
