<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">Smart Garbage Collection System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/create') }}">Register Driver</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/createg') }}">Register Garbage and Garbage info</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/createg') }}">Assign</a>
      </li>
    </ul>
  </div>
</nav>