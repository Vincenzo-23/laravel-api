@extends('layouts.app')
@section('title', 'Project')
@section('content')

    <div class="container p-3">
        <div class="row align-items-center">
            <h1 class="col-auto">Project: {{ $project->title }} </h1>
            <div class="col-auto ms-auto d-flex gap-2">
                <a href="{{ route('admin.projects.edit', $project) }}" class=" btn btn-secondary">Modify</a>
                <button class="btn btn-danger delete">Delete</button>
            </div>
            
        </div>
    </div>
    <div class="container p-3">
        <p><strong>Type of the project: </strong>{{ $project->type ? $project->type->name : 'Nessun tipo' }}</p>
        <div class="fs-3"><strong>Description: </strong>{{ $project->description }}</div>
    </div>

    <div class="container p-3 d-flex gap-1">
      <p><strong>Technology used: </strong></p>
      <ul class="d-flex gap-2 list-unstyled">
        @foreach ($project->technologies as $technology)
            <li>{{ $technology->name }}</li>
        @endforeach
      </ul>
    </div>

    <div class="modal" id="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete</h5>
              <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Clicking on Yes you will delete the project. Are you sure?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">No</button>
              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        
                @csrf
                @method('DELETE')
  
                <button class="btn btn-danger delete">yes</button>
            
                </form> 
            </div>
          </div>
        </div>
    </div>
@endsection