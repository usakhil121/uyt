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
    <h2 class="card-header">Show Project</h2>
    <div class="card-body">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('projects.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Name:</strong> <br/>
                    {{ $project->project_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong> <br/>
                    {{ $project->description }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Technology:</strong> <br/>
                    {{ $project->technology }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Status:</strong> <br/>
                    {{ $project->status }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Link:</strong> <br/>
                    {{ $project->link }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
