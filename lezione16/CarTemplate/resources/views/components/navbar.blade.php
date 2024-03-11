<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('welcome')}}">{{env('APP_NAME')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('cars.create')}}">Create Car</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('cars.index')}}">Dashboard Car</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('brands.create')}}">Create Brand</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('brands.index')}}">Dashboard Brand</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('extras.create')}}">Create Extra</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('extras.index')}}">Dashboard Extra</a>
          </li>
          @endauth

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          @endguest

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('cars.index')}}">Cars Dashboard</a></li>
              <li><a class="dropdown-item" href="{{ route('logout')}}" 
                onclick="event.preventDefault();
                getElementById('form-logout').submit()">Logout</a></li>
             
              <form id="form-logout" action="{{ route('logout')}}" method="POST" class="d-none">
              @csrf
              </form>
            </ul>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>