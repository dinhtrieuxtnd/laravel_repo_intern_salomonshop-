<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Salomon Shop</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> {{-- hàm asset truy cập đến folder public --}}
    <!-- Thêm vào file layout master trong phần head -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('frontend/layout/partials/header')
    <div style="border: 2px solid pink; margin-top: 76px; padding-bottom: 16px" class="container">
        @yield('content')
    </div>
    @include('frontend/layout/partials/footer')
</body>
</html>
