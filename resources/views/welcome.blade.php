<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://unpkg.com/htmx.org/dist/htmx.js"></script> <!-- Include HTMX library -->
    <style>
        body {
            /* font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4; */
        }
        h1 {
            text-align: center;
        }
        .mainbox {
            border-radius: 5px;
            margin: 20px auto;
            padding: 10px;
            max-width: auto;
        }
        .project {
            border-radius: 5px;
            margin: 20px auto;
            padding: 10px;
            max-width: auto;
        }
        .project summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            list-style: none;
        }
        .project summary::marker {
            display: none;
        }
        .project-name {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
        .plus-icon::before {
            content: '+';
            font-size: 1.5em;
            line-height: 0.5em;
            transition: transform 0.3s;
        }
        details[open] .plus-icon::before {
            content: '-';
            transform: rotate(45deg);
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header class="form-control" id="header">
    <div class="row">
        <div class="col-md-11">
            <p class="col-md-8 fs-4"></p><br/>
        </div>
        <div class="col-md-1 d-flex justify-content-end align-items-center">
            <a class="dropdown-item me-2" href="#" hx-get="{{ route('login') }}" hx-target=".mainbox" hx-trigger="click" hx-swap="outerHTML">
                {{ __('Login') }}
            </a>
            <a class="dropdown-item" href="#" hx-get="{{ route('register') }}" hx-target=".mainbox" hx-trigger="click" hx-swap="outerHTML">
                {{ __('Register') }}
            </a>
        </div>
    </div>
</header>

<div class="mainbox" hx-target="#mainbox">
    <div class="form-control">
        <h1>Projects</h1>
        @foreach($projects as $project)
            <div class="project"> 
                <details class="form-control">
                    <summary style="cursor: pointer;">
                        <h4><span>{{ $project->project_name }}</span></h4> <!-- Ensure this matches your DB column -->
                        <span class="plus-icon"></span>
                    </summary>
                    <hr>
                    <div class="project-details">
                        <p><strong>Description:</strong> {{ $project->description }}</p> <!-- Ensure this matches your DB column -->
                        <p><strong>Technologies:</strong> {{ $project->technology }}</p> <!-- Ensure this matches your DB column -->
                        <p><strong>Status:</strong> {{ $project->status }}</p> <!-- Ensure this matches your DB column -->
                        <p><a href="{{ $project->link }}" target="_blank" class="site-link">Link</a></p> <!-- Ensure this matches your DB column -->
                    </div>
                </details>
            </div>
        @endforeach
        <div>
           
            {{ $projects->links() }}
        </div>
        <hr>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    // Hide the header when navigating to login or register pages
    document.querySelectorAll('a[hx-get]').forEach(function(link) {
        link.addEventListener('click', function() {
            document.getElementById('header').style.display = 'none';
        });
    });
</script>
</body>
</html>
