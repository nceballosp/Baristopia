<!-- NCP -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>@yield('title', 'Baristopia')</title>
</head>
<body>
  <div class="sidebar">
    <a href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a>
    <a href="{{ route('admin.order.index') }}">{{ __('messages.order') }}</a>
    <a href="{{ route('admin.payment.index') }}">{{ __('messages.payment') }}</a>
  </div>

  <div class="container my-4">
    @yield('content')
  </div>

</body>
</html>