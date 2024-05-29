@extends('layouts.app')

@section('title', 'Laravel 11 Custom Dashboard - itsolutionstuff.com')

@section('content')
<main>
  <div class="container py-4">
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
    <div class="form-control">
      <div class="container-fluid py-5">
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" id="project_name" name="project_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="technology">Technology:</label>
            <input type="text" id="technology" name="technology" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
              <option value="completed">Completed</option>
              <option value="not_completed">Not Completed</option>
            </select>
          </div>
          <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" id="link" name="link" class="form-control" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
