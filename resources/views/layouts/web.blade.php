<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body>
    <!-- As a heading -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Timestamp') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a id="orders-link" class="nav-link" href="{{ url('/') }}">Orders</a>
            </li>
            <li class="nav-item">
              <a id="events-link" class="nav-link" href="{{ route('events') }}">Events</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('myScript')
  </body>
</html>