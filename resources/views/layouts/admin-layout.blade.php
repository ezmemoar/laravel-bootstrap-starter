<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Dashboard</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">
  <link href="{{ asset('css/admin-theme.css') }}" rel="stylesheet">

  @stack('css')
  @stack('start-scripts')
</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('layouts/admin/navbar')
    @include('layouts/admin/ui-settings')

    <div class="app-main">
      @include('layouts/admin/sidebar')

      <div class="app-main__outer">
        @yield('content')
        @include('layouts/admin/footer')
      </div>
    </div>
  </div>

  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="{{ asset('js/admin-theme.js') }}"></script>
  @stack('end-scripts')
</body>

</html>