<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/css/intlTelInput.css'><link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

</head>
<body>

    @include('layouts.frontend.body.header')

    @yield('content')

    @include('layouts.frontend.body.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/intlTelInput.js'></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
</body>
</html>
