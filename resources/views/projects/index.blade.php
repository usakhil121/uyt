@extends('projects.layout')

@section('title', 'Laravel 11 CRUD Example')

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
@if(session('success'))
  <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card mt-5">
    <h2 class="card-header" align="center">Projects</h2>

    

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('projects.create') }}"> <i class="fa fa-plus"></i> Create New Project</a>
    </div>

    <table class="table table-bordered table-custom mt-3">
        <thead>
            <tr>
                <th width="80px">No</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Technology</th>
                <th>Status</th>
                <th>Link</th>
                <th width="250px">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->project_name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->technology }}</td>
                <td>{{ $project->status }}</td>
                <td><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></td>
                <td>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('projects.show', $project->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('projects.edit', $project->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">There are no data.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {!! $projects->links() !!}
</div>
@endsection


