@extends('projects.layout')

@section('content')
<header class="form-control">
    <div class="row">
        <div class="col-md-11">
            <p class="col-md-8 fs-4">Hi, {{ auth()->user()->name }} Welcome to dashboard</p><br/>
        </div>
        <div class="col-md-1">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>
<hr>
<div class="card mt-5">
    <h2 class="card-header">Add New Project</h2>
    <div class="card-body">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('projects.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="project_name" class="form-label"><strong>Project Name:</strong></label>
                <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" id="project_name" placeholder="Project Name">
                @error('project_name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description:</strong></label>
                <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description" id="description" placeholder="Description"></textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="technology" class="form-label"><strong>Technology:</strong></label>
                <input type="text" name="technology" class="form-control @error('technology') is-invalid @enderror" id="technology" placeholder="Technology">
                @error('technology')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label"><strong>Status:</strong></label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    <option value="completed">Completed</option>
                    <option value="not_completed">Not Completed</option>
                </select>
                @error('status')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label"><strong>Link:</strong></label>
                <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Link">
                @error('link')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>
    </div>
</div>
@endsection
