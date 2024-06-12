@extends('layouts.app')
@section('title', 'Projects')
@section('content')

    <div class="container p-3">
        <div class="row align-items-center">
            <h1 class="col-auto">Projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="col-auto ms-auto btn btn-primary">Create</a>
        </div>
    </div>
    <div class="container p-3">
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Description</th>
                <th>Link</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
                <tr>
                  <td>{{ $project->id }}</td>
                  <td><a class="link-underline link-underline-opacity-0 fw-bold" href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></td>                
                  <td>{{ $project->type ? $project->type->name : '' }}</td>
                  <td>{{ $project->description }}</td>
                  <td><a href="{{ $project->link }}" class="link-underline link-underline-opacity-0">Link alla repository</a></td>
                  <td>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary">Modify</a>
                  </td>
                  <td>
                    <button class="btn btn-danger delete">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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

              <button class="btn btn-danger delete">Yes</button>
          
              </form> 
          </div>
        </div>
      </div>
  </div>
@endsection