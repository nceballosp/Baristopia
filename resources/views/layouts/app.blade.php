<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>@yield('title', 'Baristopia')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="{{route('home.index')}}">Baristopia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{route('home.index')}}">Home</a>
          <a class="nav-link active" href="{{route('product.index')}}">Products</a>
          <a class="nav-link active" href="{{route('cart.index')}}">Cart</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
          <a class="nav-link active" href="{{ route('register') }}">Register</a>
          @else
          <a class="nav-link active" href="{{route('product.create')}}">Create Product</a>
            <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
            onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
            </form>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    @yield('content')
  </div>
    
</body>
</html>