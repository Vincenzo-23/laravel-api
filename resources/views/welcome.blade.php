@extends('layouts.app')
@section('title', 'Laravel Auth Home Page')
@section('content')

    <div class="container p-3">
        <h1>Portfolio Projects</h1>
    </div>
    <div class="container p-3">
        Click here to see the 
        <a href="{{route('admin.projects.index')}}" class="link-underline link-underline-opacity-0">Projects</a>
    </div>

@endsection