@extends('layouts.app')

@section('title','Add a Project')

@section('content')

<div class="container p-4">
  <h2 class="fs-2">Add a new Project</h2>
</div>

<div class="container p-4">
  <form action="{{ route('admin.projects.store') }}" method="POST">

    @csrf 

    <div class="mb-3">
      <label for="title" class="form-label"><strong>Title of the project</strong></label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Write the title" value="{{old('title')}}">
    </div>


    <div class="mb-3">
      <label for="type_id" class="form-label"><strong>Type of the project</strong></label>
      <select name="type_id" class="form-control" id="type_id">
        <option value="">--Select the type--</option>
        @foreach ($types as $type)
            <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>  
    </div>

    <div class="form-group">
      <h5>Select the technologies</h5>

      <div class="d-flex gap-2 mb-3">
        @foreach ($technologies as $technology)

          <div class="form-check">
            <input @checked( in_array($technology->id, old('technologies',[])) ) name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{$technology->id}}">
            <label class="form-check-label" for="technology-{{$technology->id}}">
              {{ $technology->name }}
            </label>
          </div>
            
        @endforeach
    </div>


    <div class="mb-3">
      <label for="link" class="form-label"><strong>Link of the project</strong></label>
      <input type="text" name="link" class="form-control" id="link" placeholder="Write the link to the repository" value="{{old('link')}}">
    </div>


    <div class="mb-3">
      <label for="description" class="form-label"><strong>Project description</strong></label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write a description of your project">{{old('description')}}</textarea>
    </div>


    <button class="btn btn-primary">Add</button>
  </form>

  @if ($errors->any())
    <div class="alert alert-danger mt-3">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>

@endsection