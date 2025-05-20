<!-- NCP -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Baristopia')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="{{route('home.index')}}">{{ __('messages.baristopia') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{route('admin.order.index')}}">{{ __('messages.products') }}</a>
          <a class="nav-link active" href="{{route('admin.payment.index')}}">{{ __('messages.recipes') }}</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>