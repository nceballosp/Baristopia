<!-- NCP -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Baristopia')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <img src="{{ asset('images/Logop.png') }}" alt="Logo" height="80">
      <a class="navbar-brand" href="{{route('home.index')}}">{{ __('messages.baristopia') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{route('home.index')}}">{{ __('messages.home') }}</a>
          <a class="nav-link active" href="{{route('product.index')}}">{{ __('messages.products') }}</a>
          <a class="nav-link active" href="{{route('recipe.index')}}">{{ __('messages.recipes') }}</a>
          <a class="nav-link active" href="{{route('cart.index')}}">{{ __('messages.cart') }}</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{ __('messages.login') }}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{ __('messages.register') }}</a>
          @else
          <a class="nav-link active" href="{{route('product.create')}}">{{ __('messages.createProduct') }}</a>
          <a class="nav-link active" href="{{route('recipe.create')}}">{{ __('messages.createRecipe') }}</a>
          <a class="nav-link active" href="/baristopia">{{ __('messages.admin') }}</a>
            <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
            onclick="document.getElementById('logout').submit();">{{ __('messages.logout') }}</a>
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