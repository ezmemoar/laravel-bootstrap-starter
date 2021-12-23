<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">
  <link href="{{ asset("css/admin-theme.css") }}" rel="stylesheet">
</head>

<body>
  <div class="w-100 row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-header-title text-center">Login</h3>
        </div>
        <div class="card-body py-4">
          <x-form method="POST" :action="route('admin.login.post')">
            <x-form-input name="username" placeholder="Username" />
            <x-form-input name="password" type="password" placeholder="Password" />
            <button class="btn btn-primary">Login</button>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>